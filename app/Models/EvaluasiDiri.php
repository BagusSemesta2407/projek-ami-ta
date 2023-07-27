<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EvaluasiDiri extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];

    public function dataInstrument()
    {
        return $this->belongsTo(DataInstrument::class);
    }

    /**
     * Get the instrument that owns the EvaluasiDiri
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instrument(): BelongsTo
    {
        return $this->belongsTo(Instrument::class);
    }


    // /**
    //  * Get all of the auditDokumen for the EvaluasiDiri
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function auditDokumen(): HasMany
    // {
    //     return $this->hasMany(AuditDokumen::class);
    // }

    /**
     * Get the auditDokumen associated with the EvaluasiDiri
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function auditDokumen(): HasOne
    {
        return $this->hasOne(AuditDokumen::class, 'evaluasi_diri_id', 'id');
    }
}
