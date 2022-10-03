<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WashingStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function washingPrograms()
    {
        return $this->belongsToMany(WashingProgram::class, "washing_program_washing_step");
    }
}
