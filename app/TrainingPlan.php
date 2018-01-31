<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingPlan extends Model
{
    protected $fillable = [
        'tp_creator',
        'tp_sport',
        'tp_distance',
        'tp_level',
        'tp_name',
        'tp_desc',
        'tp_filepath'
    ];
}
