<?php

namespace App;

use App\ModelInterfaces\ICompetition;
use App\ModelInterfaces\IDistance;
use App\ModelInterfaces\ISport;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $distance_id
 * @property ISport $sport
 * @property ISport $partsport
 * @property mixed $trainingplans
 * @property ICompetition[] $competitions
 * @property string distance_name
 * @property int distance_kilometers
 */
class Distance extends Model implements IDistance
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

    /**
     * @return int
     */
    public function getDistanceId(): int
    {
        return $this->distance_id;
    }

    /**
     * @param int $distance_id
     */
    public function setDistanceId(int $distance_id)
    {
        $this->distance_id = $distance_id;
    }

    /**
     * @return ISport
     */
    public function getDistanceSport()
    {
        return $this->sport;
    }

    /**
     * @param ISport $distance_sport
     */
    public function setDistanceSport($distance_sport)
    {
        $this->sport = $distance_sport;
    }

    /**
     * @return ISport
     */
    public function getDistancePartsport(): ISport
    {
        return $this->partsport;
    }

    /**
     * @param ISport $distance_partsport
     */
    public function setDistancePartsport(ISport $distance_partsport)
    {
        $this->partsport = $distance_partsport;
    }

    /**
     * @return string
     */
    public function getDistanceName(): string
    {
        return $this->distance_name;
    }

    /**
     * @param string $distance_name
     */
    public function setDistanceName(string $distance_name)
    {
        $this->distance_name = $distance_name;
    }

    /**
     * @return int
     */
    public function getDistanceKilometers(): int
    {
        return $this->distance_kilometers;
    }

    /**
     * @param int $distance_kilometers
     */
    public function setDistanceKilometers(int $distance_kilometers)
    {
        $this->distance_kilometers = $distance_kilometers;
    }
}
