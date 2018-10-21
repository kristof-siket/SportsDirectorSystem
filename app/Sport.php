<?php

namespace App;

use App\ModelInterfaces\ICompetition;
use App\ModelInterfaces\IDistance;
use App\ModelInterfaces\IResult;
use App\ModelInterfaces\ISport;
use App\ModelInterfaces\ITrainingPlan;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $sport_id
 * @property ICompetition[] $competitions
 * @property IResult[] $results
 * @property IDistance[] $distances
 * @property ITrainingPlan[] $trainingplans
 * @property string sport_name
 * @property bool multisport
 * @property string sport_desc
 */
class Sport extends Model implements ISport
{
    protected $primaryKey = 'sport_id';

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

    /**
     * @return int
     */
    public function getSportId()
    {
        return $this->sport_id;
    }

    /**
     * @param int $sport_id
     */
    public function setSportId($sport_id)
    {
        $this->sport_id = $sport_id;
    }

    /**
     * @return string
     */
    public function getSportName(): string
    {
        return $this->sport_name;
    }

    /**
     * @param string $sport_name
     */
    public function setSportName(string $sport_name)
    {
        $this->sport_name = $sport_name;
    }

    /**
     * @return bool
     */
    public function isMultisport(): bool
    {
        return $this->multisport;
    }

    /**
     * @param bool $multisport
     */
    public function setMultisport(bool $multisport)
    {
        $this->multisport = $multisport;
    }

    /**
     * @return string
     */
    public function getSportDesc(): string
    {
        return $this->sport_desc;
    }

    /**
     * @param string $sport_desc
     */
    public function setSportDesc(string $sport_desc)
    {
        $this->sport_desc = $sport_desc;
    }
}
