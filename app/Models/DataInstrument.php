<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInstrument extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // public function auditee(){
    //     return $this->belongsTo(Auditee::class);
    // }

    // public function auditor(){
    //     return $this->belongsTo(Auditor::class);
    // }
    public function auditor(){
        return $this->belongsTo(User::class, 'auditor_id', 'id');
    }

    public function auditee(){
        return $this->belongsTo(User::class, 'auditee_id', 'id');
    }
    public function categoryUnit(){
        return $this->belongsTo(CategoryUnit::class);
    }

    public function instrumentAuditee(){
        return $this->hasMany(InstrumentAuditee::class);
    }
}