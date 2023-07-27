<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeskripsiTopicRapatTinjauan extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    /**
     * Get the topic that owns the DeskripsiTopicRapatTinjauan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}
