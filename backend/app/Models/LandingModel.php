<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingModel extends Model
{
    protected $table = 'landing_information';
    protected $fillable = [
        'HeaderDesk',
        'HeaderSkill',
        'CV',
        'AboutDesk'
    ];

    protected $casts = [
        'HeaderSkill' => 'array'
    ];
}
