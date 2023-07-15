<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ppppmp extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    /**
     * Get the user that owns the P4MP
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
