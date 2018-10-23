<?php

namespace App;

use App\ModelInterfaces\ILevel;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $level_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Level extends Model implements ILevel
{
    protected $primaryKey = 'level_id';

    protected $fillable = [
        'level_num',
        'level_desc'
    ];

    public function training_plans()
    {
        $this->hasMany('App\TrainingPlan', 'tp_level');
    }
}
