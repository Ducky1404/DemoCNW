<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'author',
        'category',
        'year',
        'quantity',
    ];
}
