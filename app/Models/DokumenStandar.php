<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class DokumenStandar extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the typeDokumenMutu that owns the DokumenStandar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeDokumenMutuStandar()
    {
        return $this->belongsTo(TypeDokumenMutuStandar::class);
    }

    protected $appends = ['file_url'];


    /**
     * Save image.
     *
     * @param  $request
     * @return string
     */
    public static function saveFile($request)
    {
        $filename = null;

        if ($request->file) {
            $file = $request->file;

            $name=$file->getClientOriginalName();
            $filename = $name;
            $file->storeAs('public/file/dokumenStandar/', $filename);
        }

        return $filename;
    }

    /**
     * Get the image owner url.
     *
     * @return string
     */
    public function getFileUrlAttribute()
    {
        if ($this->file) {
            return asset('storage/public/file/dokumenStandar/' . $this->file);
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
        $dokumenStandar = DokumenStandar::firstWhere('id', $id);
        if ($dokumenStandar->file != null) {
            $path = 'public/file/dokumenStandar/' . $dokumenStandar->file;
            if (Storage::exists($path)) {
                Storage::delete('public/file/dokumenStandar/' . $dokumenStandar->file);
            }
        }
    }
}
