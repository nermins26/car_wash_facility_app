<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'program_id',
        'order_phase_id',
        'car_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(WashingProgram::class);
    }

    public function phase()
    {
        return $this->belongsTo(OrderPhase::class, 'order_phase_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
