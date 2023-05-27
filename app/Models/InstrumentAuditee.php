<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InstrumentAuditee extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function dataInstrument(){
        return $this->belongsTo(DataInstrument::class);
    }

    public function instrument(){
        return $this->belongsTo(Instrument::class);
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['proof_url'];

    /**
     * Save proof Owner.
     *
     * @param  $request
     * @return string
     */
    public static function saveProof($request)
    {
        $filename = null;

        if ($request->proof) {
            $file = $request->proof;

            foreach ($file as $key) {
                $ext = $key->getClientOriginalExtension();
                $filename = date('YmdHis') . uniqid() . '.' . $ext;
                // $filename = str_random(5)."-".date('his')."-".str_random(3).".".$ext;
                $file->storeAs('public/instrumentAuditee/proof/', $filename);
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
            return asset('storage/public/instrumentAuditee/proof/' . $this->proof);
        }

        return null;
    }

    /**
     * Delete proof.
     *
     * @param  $id
     * @return void
     */
    public static function deleteProof($id)
    {
        $instrumentAuditee = InstrumentAuditee::firstWhere('id', $id);
        if ($instrumentAuditee->proof != null) {
            $path = 'public/instrumentAuditee/proof/' . $instrumentAuditee->proof;
            if (Storage::exists($path)) {
                Storage::delete('public/instrumentAuditee/proof/' . $instrumentAuditee->proof);
            }
        }
    }
}
