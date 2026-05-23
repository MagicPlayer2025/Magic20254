<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $fillable = [
        'service_id',
        'user_id',
        'master_id',
        'client_name',
        'client_phone',
        'client_email',
        'appointment_date',
        'appointment_time',
        'comment',
        'status',
        'total_price',
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'total_price' => 'decimal:2',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }
}
