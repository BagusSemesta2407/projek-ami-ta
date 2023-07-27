<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    /**
     * Get the risalahRapat that owns the Topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function risalahRapat(): BelongsTo
    {
        return $this->belongsTo(RisalahRapat::class);
    }

    /**
     * Get all of the deskripsiTopicRapatTinjauan for the Topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deskripsiTopicRapatTinjauan(): HasMany
    {
        return $this->hasMany(DeskripsiTopicRapatTinjauan::class);
    }
}
