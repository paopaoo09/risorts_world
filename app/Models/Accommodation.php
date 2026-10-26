<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\eloquent\Relations\HasMany;

class Accommodation extends Model
{
    protected $primaryKey = 'accommodation_id';

    protected $fillable = [
        'accommodation_name', 
        'description', 
        'capacity', 
        'price_per_night', 
        'availability_status'
    ];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'accommodation_id', 'accommodation_id');
    }
}
