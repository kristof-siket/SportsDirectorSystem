<?php

namespace App;

use App\ModelInterfaces\ICompetition;
use App\ModelInterfaces\IDistance;
use App\ModelInterfaces\IResult;
use App\ModelInterfaces\ISport;
use App\ModelInterfaces\IUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property IUser comp_promoter
 * @property ISport $sport
 * @property IUser $promoter
 * @property IResult[] $results
 * @property string comp_name
 * @property IDistance[] $distances
 * @property mixed comp_date
 * @property string comp_location
 * @property int $comp_id
 * @property ISport comp_sport
 */
class Competition extends Model implements ICompetition
{
    protected $primaryKey = 'comp_id';

    protected $fillable = [
        'comp_sport',
        'comp_promoter',
        'comp_name',
        'comp_date',
        'comp_location'
    ];

    public function sport()
    {
        return $this->belongsTo('App\Sport', 'comp_sport');
    }

    public function promoter()
    {
        return $this->belongsTo('App\User', 'comp_promoter');
    }

    public function results()
    {
        return $this->hasMany('App\Result', 'result_competition');
    }

    public function distances()
    {
        return $this->hasMany('App\CompetitionsDistances', 'competition_id');
    }

    /**
     * @return int
     */
    public function getCompId()
    {
        return $this->comp_id;
    }

    /**
     * @param int $comp_id
     */
    public function setCompId($comp_id)
    {
        $this->comp_id = $comp_id;
    }

    /**
     * @return ISport
     */
    public function getCompSport()
    {
        return $this->sport;
    }

    /**
     * @param ISport $comp_sport
     */
    public function setCompSport($comp_sport)
    {
        $this->comp_sport = $comp_sport;
    }

    /**
     * @return IUser
     */
    public function getCompPromoter()
    {
        return $this->comp_promoter;
    }

    /**
     * @param IUser $comp_promoter
     */
    public function setCompPromoter($comp_promoter)
    {
        $this->comp_promoter = $comp_promoter;
    }

    /**
     * @return IResult[]
     */
    public function getCompResults()
    {
        return $this->results();
    }

    /**
     * @return IDistance[]
     */
    public function getCompDistances()
    {
        return $this->distances();
    }

    /**
     * @return string
     */
    public function getCompName()
    {
        return $this->comp_name;
    }

    /**
     * @param string $comp_name
     */
    public function setCompName($comp_name)
    {
        $this->comp_name = $comp_name;
    }

    /**
     * @return mixed
     */
    public function getCompDate()
    {
        return Carbon::parse($this->comp_date);
    }

    /**
     * @param mixed $comp_date
     */
    public function setCompDate($comp_date)
    {
        $this->comp_date = $comp_date;
    }

    /**
     * @return string
     */
    public function getCompLocation()
    {
        return $this->comp_location;
    }

    /**
     * @param string $comp_location
     */
    public function setCompLocation($comp_location)
    {
        $this->comp_location = $comp_location;
    }
}
