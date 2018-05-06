<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    protected $primaryKey = 'distance_id';

    protected $fillable = [
        'distance_sport',
        'multi_id',
        'distance_name',
        'distance_kilometers'
    ];

    public function sport()
    {
        return $this->belongsTo('App\Sport', 'distance_sport');
    }

    public function partsport()
    {
        return $this->belongsTo('App\Sport', 'multi_id');
    }

    public function trainingplans()
    {
        return $this->hasMany('App\TrainingPlan', 'tp_distance');
    }

    public function competitions()
    {
        return $this->hasMany('App\CompetitionDistances', 'distance_id');
    }
}
