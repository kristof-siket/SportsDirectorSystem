<?php

namespace App;

use App\ModelInterfaces\ICompetition;
use App\ModelInterfaces\ICompetitionDistance;
use App\ModelInterfaces\IDistance;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property ICompetition $competition
 * @property IDistance $distance
 * @property int $id
 */
class CompetitionsDistances extends Model implements ICompetitionDistance
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'competition_id',
        'distance_id'
    ];

    public function competition()
    {
        return $this->belongsTo('App\Competition', 'competition_id');
    }

    public function distance()
    {
        return $this->belongsTo('App\Distance', 'distance_id');
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return ICompetition
     */
    public function getCompetition(): ICompetition
    {
        return $this->competition;
    }

    /**
     * @param ICompetition $competition
     */
    public function setCompetition(ICompetition $competition)
    {
        $this->competition = $competition;
    }

    /**
     * @return IDistance
     */
    public function getDistance(): IDistance
    {
        return $this->distance;
    }

    /**
     * @param IDistance $distance
     */
    public function setDistance(IDistance $distance)
    {
        $this->distance = $distance;
    }
}
