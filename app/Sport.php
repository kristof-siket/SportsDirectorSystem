<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = [
            'sport_name',
            'multisport',
            'sport_desc'
    ];

    public function competitions()
    {
        return $this->hasMany('App\Competition', 'comp_sport');
    }

    public function results()
    {
        return $this->hasMany('App\Result', 'result_sport');
    }

    public function distances()
    {
        return $this->hasMany('App\Distance', 'distance_sport');
    }

    public function trainingplans()
    {
        return $this->hasMany('App\TrainingPlan', 'tp_sport');
    }
}
