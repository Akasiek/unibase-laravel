<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    protected $fillable = [
        'name',
        'date',
        'info',
        'subject_id',
        'event_type_id',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    protected function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
