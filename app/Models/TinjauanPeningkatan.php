<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TinjauanPeningkatan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the dokumenStandar that owns the TinjauanPeningkatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dokumenStandar(): BelongsTo
    {
        return $this->belongsTo(DokumenStandar::class);
    }
}
