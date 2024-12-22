<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'room_number',
        'capacity',
        'building',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
