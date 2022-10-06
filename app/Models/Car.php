<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brend',
        'model',
        'color',
        'year',
        'profile_id'
    ];

    public function return()
    {
        $this->belongsTo(Profile::class);
    }
}
