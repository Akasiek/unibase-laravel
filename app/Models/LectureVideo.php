<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LectureVideo extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'youtube_link',
    ];

    protected function lecture(): BelongsTo
    {
        return $this->belongsTo(Lecture::class);
    }
}
