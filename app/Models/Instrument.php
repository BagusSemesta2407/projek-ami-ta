<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Instrument extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function categoryUnit()
    {
        return $this->belongsTo(CategoryUnit::class);
    }

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
        // $query->when($param->status_standar ?? false, fn ($q, $status_standar) => $q->where('status_standar', $status_standar));
        // return dd($filter);

        $query->when($filter->category_unit_id ?? false, fn ($query, $categoryUnit) => $query->where('category_unit_id', $categoryUnit));

        $query->when($filter->status_standar ?? false, fn ($query, $status_standar) => $query->where('status_standar', $status_standar));
    }
    
}
