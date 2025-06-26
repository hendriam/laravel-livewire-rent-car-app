<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_id',
        'car_id',
        'driver_id',
        'with_driver',
        'start_date',
        'end_date',
        'status',
        'total_price',
        'notes',
        'confirmed_by',
        'cancelled_by',
        'completed_by',
    ];

    protected $casts = [
        'with_driver' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function confirmed_by()
    {
        return $this->belongsTo(User::class);
    }

    public function cancelled_by()
    {
        return $this->belongsTo(User::class);
    }

    public function completed_by()
    {
        return $this->belongsTo(User::class);
    }
}
