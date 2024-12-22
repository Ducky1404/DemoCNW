<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'classroom_id',
        'course_name',
        'day_of_week',
        'time_slot',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
