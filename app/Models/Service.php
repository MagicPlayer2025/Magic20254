<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'duration_minutes',
        'price',
        'category',
        'icon',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function masters(): BelongsToMany
    {
        return $this->belongsToMany(Master::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
