<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryUnit extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function instrument()
    {
        return $this->hasMany(Instrument::class);
    }

    public function dataInstrument()
    {
        return $this->hasMany(DataInstrument::class);
    }

    /**
     * Scope Filter.
     *
     * @return scope
     */
    public function scopeFilter($query, $filter)
    {
        // $query->when($param->status_standar ?? false, fn ($q, $status_standar) => $q->where('status_standar', $status_standar));
        // return dd($filter);

        $query->when($filter->category_unit_id ?? false, fn ($query, $categoryUnit) => $query->where('category_unit_id', $categoryUnit));

    }
}
