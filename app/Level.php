<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $primaryKey = 'level_id';

    protected $fillable = [
        'level_num',
        'level_desc'
    ];

    public function trainingplans()
    {
        $this->hasMany('App\TrainingPlan', 'tp_level');
    }
}
