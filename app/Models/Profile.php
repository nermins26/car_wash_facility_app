<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }


    public static function boot() {
        parent::boot();

        self::deleting(function($profile) { // before delete() method call this

            if($profile->cars) {
                $profile->cars()->each(function($car) {
                    $car->delete();
                });
            }
            
        });
    }
}
