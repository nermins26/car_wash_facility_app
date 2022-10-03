<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WashingProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function washingSteps()
    {
        return $this->belongsToMany(WashingStep::class, "washing_program_washing_step");
    }

}
