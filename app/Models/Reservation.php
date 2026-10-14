<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $primaryKey = 'reservation_id';
    protected $fillable = [
        'user_id',
        'accommodation_id',
        'check_in_date',
        'check_out_date',
        'total_price',
        'reservation_status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function accommodation(): BelongsTo
    {
        return $this->belongsTo(Accommodation::class, 'accommodation_id', 'accommodation_id');
    }
}
