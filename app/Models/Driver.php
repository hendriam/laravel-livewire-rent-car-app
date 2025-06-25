<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'fullname',
        'phone',
        'address',
        'status',
        'photo',
    ];
}
