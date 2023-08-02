<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jenjang extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    /**
     * Get all of the programStudi for the Jenjang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programStudi(): HasMany
    {
        return $this->hasMany(ProgramStudi::class);
    }
}
