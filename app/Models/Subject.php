<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'color',
        'archived_at',
    ];

    protected $casts = [
        'archived_at' => 'timestamp',
    ];

    protected $appends = [
        'is_archived',
    ];

    public function getIsArchivedAttribute(): bool
    {
        return $this->archived_at !== null;
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
