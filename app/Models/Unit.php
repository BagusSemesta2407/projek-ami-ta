<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];



    /**
     * Get all of the auditor for the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function auditor(): HasMany
    {
        return $this->hasMany(Auditor::class);
    }

    /**
     * Get all of the instrument for the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function instrument(): HasMany
    {
        return $this->hasMany(Instrument::class);
    }

    /**
     * Get all of the dataInstrument for the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataInstrument(): HasMany
    {
        return $this->hasMany(DataInstrument::class);
    }
}
