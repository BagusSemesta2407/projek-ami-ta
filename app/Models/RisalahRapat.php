<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RisalahRapat extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    /**
     * Get all of the topic for the RisalahRapat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topic(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
}
