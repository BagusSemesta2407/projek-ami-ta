<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AuditDokumen extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the evaluasiDiri that owns the AuditDokumen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evaluasiDiri(): BelongsTo
    {
        return $this->belongsTo(EvaluasiDiri::class);
    }

    /**
     * Get all of the auditLapangan for the AuditDokumen
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function auditLapangan(): HasMany
    {
        return $this->hasMany(AuditLapangan::class);
    }
}
