<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Auditor extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the dataInstrument for the Auditor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataInstrument(): HasMany
    {
        return $this->hasMany(DataInstrument::class);
    }

    /**
     * Get the jurusan that owns the Auditor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }

    /**
     * Get the programStudi that owns the Auditor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programStudi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    /**
     * Get the unit that owns the Auditor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    protected $appends = ['file_url'];

    public static function saveFile($request)
    {
        $filename = null;

        if ($request->file) {
            # code...
            $file = $request->file;

            $name=$file->getClientOriginalName();

            $filename=$name;

            $file->storeAs('public/file/skAuditor/', $filename);
        }
        
        return $filename;
    }

    public function getFileUrlAttribute()
    {
        if ($this->file) {
            # code...
            return asset('storage/public/file/skAuditor/' . $this->file);
        }

        return null;
    }

    public static function deleteFile($id)
    {
        $auditor = Auditor::firstWhere('id', $id);

        if ($auditor->file != null) {
            # code...
            $path = 'public/file/skAuditor/' . $auditor->file;

            if (Storage::exists($path)) {
                # code...
                Storage::delete('public/file/skAuditor/' . $auditor->file);
            }
        }
    }
}
