<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lingkup extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    /**
     * Get the dataInstrument that owns the Lingkup
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dataInstrument(): BelongsTo
    {
        return $this->belongsTo(DataInstrument::class);
    }
}
