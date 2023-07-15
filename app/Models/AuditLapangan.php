<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AuditLapangan extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    /**
     * Get the auditDokumen that owns the AuditLapangan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function auditDokumen(): BelongsTo
    {
        return $this->belongsTo(AuditDokumen::class);
    }

    /**
     * Get all of the tinjauanPengendalian for the AuditLapangan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tinjauanPengendalian(): HasMany
    {
        return $this->hasMany(TinjauanPengendalian::class);
    }
}
