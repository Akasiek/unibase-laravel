<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecture extends Model
{
    protected $fillable = [
        'notion_link',
        'date',
        'summary',
        'subject_id'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    protected function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    protected function videos(): HasMany
    {
        return $this->hasMany(LectureVideo::class);
    }
}
