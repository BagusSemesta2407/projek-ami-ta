<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TinjauanPengendalian extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    /**
     * Get the auditLapangan that owns the TinjauanPengendalian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function auditLapangan(): BelongsTo
    {
        return $this->belongsTo(AuditLapangan::class);
    }
}
