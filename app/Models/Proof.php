<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Proof extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    // public function instrumentAuditee()
    // {
    //     return $this->hasMany(InstrumentAuditee::class);
    // }

    protected $casts = [
        'data' => 'array'
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['proof_url'];

    /**
     * Save proof Owner.
     *
     * @return string
     */
    public static function saveProof($request)
    {
        $filename = null;

        if ($request->proof) {
            $file = $request->proof;

            foreach ($file as $key) {
                $ext = $key->getClientOriginalExtension();
                $filename = date('YmdHis').uniqid().'.'.$ext;
                $filename = str_random(5)."-".date('his')."-".str_random(3).".".$ext;
                $file->storeAs('public/proof/', $filename);
            }
        }

        return $filename;
    }

    /**
     * Get the file proof.
     *
     * @return string
     */
    public function getProofUrlAttribute()
    {
        if ($this->proof) {
            return asset('storage/public/proof/'.$this->proof);
        }

        return null;
    }

    /**
     * Delete proof.
     *
     * @return void
     */
    public static function deleteProof($id)
    {
        $instrumentAuditee = InstrumentAuditee::firstWhere('id', $id);
        if ($instrumentAuditee->proof != null) {
            $path = 'public/proof/'.$instrumentAuditee->proof;
            if (Storage::exists($path)) {
                Storage::delete('public/proof/'.$instrumentAuditee->proof);
            }
        }
    }
}
