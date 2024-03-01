<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecture extends Model
{
    protected $fillable = [
        'date',
        'summary',
        'subject_id',
        'notion_link',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function videos(): HasMany
    {
        return $this->hasMany(LectureVideo::class);
    }
}
