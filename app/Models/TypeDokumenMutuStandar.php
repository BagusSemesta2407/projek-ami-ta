<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeDokumenMutuStandar extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get all of the dokumenStandar for the TypeDokumenMutuStandar
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dokumenStandar()
    {
        return $this->hasMany(DokumenStandar::class);
    }
}
