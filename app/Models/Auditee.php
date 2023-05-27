<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditee extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function dataInstrument(){
    //     return $this->hasMany(DataInstrument::class);
    // }

}
