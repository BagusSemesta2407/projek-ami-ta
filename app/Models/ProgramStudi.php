<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    /**
     * Get the jurusan that owns the ProgramStudi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }


    /**
     * Get all of the auditor for the ProgramStudi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function auditor(): HasMany
    {
        return $this->hasMany(Auditor::class);
    }

    /**
     * Get all of the instrument for the ProgramStudi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function instrument(): HasMany
    {
        return $this->hasMany(Instrument::class);
    }

    /**
     * Get all of the dataInstrument for the ProgramStudi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataInstrument(): HasMany
    {
        return $this->hasMany(DataInstrument::class);
    }

    /**
     * Get the jenjang that owns the ProgramStudi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenjang(): BelongsTo
    {
        return $this->belongsTo(Jenjang::class);
    }
}
