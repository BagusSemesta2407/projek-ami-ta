<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DataInstrument extends Model implements HasMedia
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
        return $this->belongsTo(User::class, 'auditor_id', 'id');
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
}
