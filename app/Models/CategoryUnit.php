<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryUnit extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function instrument(){
        return $this->hasMany(Instrument::class);
    }
}
