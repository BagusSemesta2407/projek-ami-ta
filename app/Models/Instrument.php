<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Instrument extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    // public function categoryUnit()
    // {
    //     return $this->belongsTo(CategoryUnit::class);
    // }

    public function instrumentAuditee()
    {
        return $this->hasMany(InstrumentAuditee::class);
    }

    /**
     * Get all of the evaluasiDiri for the Instrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluasiDiri(): HasMany
    {
        return $this->hasMany(EvaluasiDiri::class);
    }

    /**
     * Get the jurusan that owns the Instrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }

    /**
     * Get the programStudi that owns the Instrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programStudi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    /**
     * Get the unit that owns the Instrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    // /**
    //  * Get the evaluasiDiri associated with the Instrument
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function evaluasiDiri(): HasOne
    // {
    //     return $this->hasOne(EvaluasiDiri::class, 'instrument_id', 'id');
    // }

    /**
     * Scope Filter.
     *
     * @return scope
     */
    public function scopeFilter($query, $filter)
    {
        $query->when($filter->category_unit_id ?? false, fn ($query, $categoryUnit) => $query->where('category_unit_id', $categoryUnit));
        $query->when($filter->jurusan_id ?? false, fn ($query, $jurusan) => $query->where('jurusan_id', $jurusan));
        $query->when($filter->program_studi_id ?? false, fn ($query, $programStudi) => $query->where('program_studi_id', $programStudi));
        $query->when($filter->unit_id ?? false, fn ($query, $unit) => $query->where('unit_id', $unit));

        $query->when($filter->status_standar ?? false, fn ($query, $status_standar) => $query->where('status_standar', $status_standar));
    }
    
}
