<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class   DataInstrument extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [
        'id',
    ];

    protected $appends = [
        'file_dokumen_standar'
    ];

    // public function auditee(){
    //     return $this->belongsTo(Auditee::class);
    // }

    // public function auditor(){
    //     return $this->belongsTo(Auditor::class);
    // }

    public function auditor()
    {
        return $this->belongsTo(Auditor::class, 'auditor_id', 'id');
    }
    public function auditor2()
    {
        return $this->belongsTo(Auditor::class, 'auditor2_id', 'id');
    }

    public function auditee()
    {
        return $this->belongsTo(User::class, 'auditee_id', 'id');
    }

    public function categoryUnit()
    {
        return $this->belongsTo(CategoryUnit::class);
    }

    public function instrumentAuditee()
    {
        return $this->hasMany(InstrumentAuditee::class);
    }

    /**
     * Get all of the evaluasiDiri for the DataInstrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluasiDiri(): HasMany
    {
        return $this->hasMany(EvaluasiDiri::class);
    }

    /**
     * Get all of the tujuan for the DataInstrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tujuan(): HasMany
    {
        return $this->hasMany(Tujuan::class);
    }

    /**
     * Get all of the lingkup for the DataInstrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lingkup(): HasMany
    {
        return $this->hasMany(Lingkup::class);
    }

    /**
     * Get the jurusan that owns the DataInstrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }

    /**
     * Get the programStudi that owns the DataInstrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programStudi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    /**
     * Get the unit that owns the DataInstrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }


    public function getFileDokumenStandarAttribute()
    {
        $data=DokumenStandar::whereIn('id', $this->dokumenStandar)->get();
        if ($data->isEmpty()) {
            return null;
        }

        return $data->implode('file', '-');
    }
    protected $casts = [
        'dokumenStandar' => 'array'
    ];

    public function getDataPerBulan()
    {
        $data = [
            'januari'   => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 1)->count(),
            'februari'  => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 2)->count(),
            'maret'     => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 3)->count(),
            'april'     => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 4)->count(),
            'mei'       => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 5)->count(),
            'juni'      => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 6)->count(),
            'juli'      => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 7)->count(),
            'agustus'   => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 8)->count(),
            'september' => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 9)->count(),
            'oktober'   => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 10)->count(),
            'november'  => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 11)->count(),
            'desember'  => DataInstrument::whereYear('created_at', date('Y'))->whereMonth('created_at', 12)->count(),
        ];
        return $data;
    }
}
