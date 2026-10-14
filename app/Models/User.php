<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $primaryKey = 'user_id';

    protected $fillable = ['name', 'email', 'password', 'role'];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'user_id', 'user_id');
    }
}
