<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    protected $fillable = [
        'master_id',
        'date',
        'start_time',
        'end_time',
        'is_available',
    ];

    protected $casts = [
        'date' => 'date',
        'is_available' => 'boolean',
    ];

    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }
}
