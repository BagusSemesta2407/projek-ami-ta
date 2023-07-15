<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InstrumentAuditee extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $appends = ['bukti_url','change_dokumen_url'];

    public function dataInstrument()
    {
        return $this->belongsTo(DataInstrument::class);
    }

    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }

    // public function proof()
    // {
    //     return $this->belongsTo(Proof::class);
    // }

    /**
     * Scope Filter.
     *
     * @return scope
     */
    public function scopeFilter($query, $filter)
    {
        $query->when($filter->data_instrument_id ?? false, fn ($query, $dataInstrument) => $query->where('data_instrument_id', $dataInstrument));
    }

    /**
     * Save image Owner.
     *
     * @param  $request
     * @return string
     */
    public static function saveBukti($file)
    {
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/bukti/', $filename);

        return $filename; // Kembalikan nama file jika diperlukan
    }

    public static function saveChangeDokumen($request)
    {
        $filename = null;
        if ($request->change_dokumen) {
            $file = $request->change_dokumen;

            $name = $file->getClientOriginalName();
            $filename = $name;
            $file->storeAs('public/perubahanDokumen/', $filename);
        }

        return $filename;
    }

    public function getChangeDokumenUrlAttribute()
    {
        if ($this->change_dokumen) {
            return asset('storage/public/perubahanDokumen/' . $this->change_dokumen);
        }

        return null;
    }

    /**
     * Get the image owner url.
     *
     * @return string
     */
    public function getBuktiUrlAttribute()
    {
        if ($this->bukti) {
            return asset('storage/public/bukti/' . $this->bukti);
        }

        return null;
    }

    /**
     * Delete image.
     *
     * @param  $id
     * @return void
     */
    public static function deleteBukti($id)
    {
        $instrumentAuditee = InstrumentAuditee::firstWhere('id', $id);
        if ($instrumentAuditee->bukti != null) {
            $path = 'public/bukti/' . $instrumentAuditee->bukti;
            if (Storage::exists($path)) {
                Storage::delete('public/bukti/' . $instrumentAuditee->bukti);
            }
        }
    }

    public static function deleteChangeDokumen($id)
    {
        $instrumentAuditee = InstrumentAuditee::firstWhere('id', $id);

        if ($instrumentAuditee->change_dokumen != null) {
            $path = 'public/perubahanDokumen/' . $instrumentAuditee->change_dokumen;
            if (Storage::exists($path)) {
                Storage::delete('public/perubahanDokumen/' . $instrumentAuditee->change_dokumen);
            }
        }
    }
}
