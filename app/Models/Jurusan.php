<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jurusan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get all of the programStudi for the Jurusan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programStudi(): HasMany
    {
        return $this->hasMany(ProgramStudi::class);
    }


    /**
     * Get all of the auditor for the Jurusan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function auditor(): HasMany
    {
        return $this->hasMany(Auditor::class);
    }

    /**
     * Get all of the instrument for the Jurusan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function instrument(): HasMany
    {
        return $this->hasMany(Instrument::class);
    }

    /**
     * Get all of the dataInstrument for the Jurusan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataInstrument(): HasMany
    {
        return $this->hasMany(DataInstrument::class);
    }
}
