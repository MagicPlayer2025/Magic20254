<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'master_id',
        'client_name',
        'rating',
        'text',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
