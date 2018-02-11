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

    public function creator()
    {
        return $this->belongsTo('App\User', 'tp_creator');
    }

    public function distance()
    {
        return $this->belongsTo('App\Distance', 'tp_distance');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport', 'tp_sport');
    }

    public function level()
    {
        return $this->belongsTo('App\Level', 'tp_level');
    }
}
