<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Kesimpulan extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    protected $appends =['dokumentasi_url'];

    /**
     * Save image.
     *
     * @param  $request
     * @return string
     */
    public static function saveDokumentasi($dokumentasi)
    {
        $filename = null;

        if ($dokumentasi) {

            $name=$dokumentasi->getClientOriginalName();
            $filename = $name;
            $dokumentasi->storeAs('public/dokumentasi/', $filename);
        }

        return $filename;
    }

    /**
     * Get the image owner url.
     *
     * @return string
     */
    public function getDokumentasiUrlAttribute()
    {
        if ($this->dokumentasi) {
            return asset('storage/dokumentasi/' . $this->dokumentasi);
        }

        return null;
    }

    /**
     * Delete image.
     *
     * @param  $id
     * @return void
     */
    public static function deleteFile($id)
    {
        $kesimpulan = Kesimpulan::firstWhere('id', $id);
        if ($kesimpulan->dokumentasi != null) {
            $path = 'public/dokumentasi/' . $kesimpulan->dokumentasi;
            if (Storage::exists($path)) {
                Storage::delete('public/dokumentasi/' . $kesimpulan->dokumentasi);
            }
        }
    }
}
