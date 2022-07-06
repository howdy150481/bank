<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerBookings extends Model
{
    protected $fillable = [
        'player_id',
        'value'
    ];
}
