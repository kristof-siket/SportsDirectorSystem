<?php

namespace App;

use App\ModelInterfaces\IDistance;
use App\ModelInterfaces\ILevel;
use App\ModelInterfaces\ISport;
use App\ModelInterfaces\ITrainingPlan;
use App\ModelInterfaces\IUser;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $tp_id
 * @property IUser $creator
 * @property IDistance $distance
 * @property ISport $sport
 * @property ILevel $level
 */
class TrainingPlan extends Model implements ITrainingPlan
{
    protected $primaryKey = 'tp_id';

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
