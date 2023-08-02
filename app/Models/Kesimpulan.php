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
    public static function saveDokumentasi($request)
    {
        $filename = null;

        if ($request->hasFile('dokumentasi')) {
            $dokumentasi = $request->file('dokumentasi');
    
            // Validate file type
            $allowedTypes = ['png', 'jpg', 'jpeg'];
            $extension = $dokumentasi->getClientOriginalExtension();
            if (in_array($extension, $allowedTypes)) {
                // Generate a unique filename
                $name = time() . '_' . $dokumentasi->getClientOriginalName();
                // Save the file in the specified storage path
                $dokumentasi->storeAs('public/dokumentasi/', $name);
                $filename = $name;
            } else {
                // File type not allowed, handle the error as needed
                // For example, you could display an error message or redirect back with an error status
                return null;
            }
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
