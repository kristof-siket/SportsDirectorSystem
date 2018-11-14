<?php

namespace App;

use App\ModelInterfaces\ICompetition;
use App\ModelInterfaces\IDistance;
use App\ModelInterfaces\IResult;
use App\ModelInterfaces\ISport;
use App\ModelInterfaces\IUser;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $result_id
 * @property IUser $athlete
 * @property IDistance $distance
 * @property ISport $sport
 * @property ICompetition $competition
 * @property ISport $multi_sport
 * @property bool disqualified
 * @property int result_time
 */
class Result extends Model implements IResult
{
    protected $primaryKey = 'result_id';

    protected $fillable = [
        'result_athlete',
        'result_distance',
        'result_sport',
        'result_multisport',
        'result_competition',
        'disqualified',
        'result_time'
    ];

    public function athlete()
    {
        return $this->belongsTo('App\User', 'result_athlete');
    }

    public function distance()
    {
        return $this->belongsTo('App\Distance', 'result_distance');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport', 'result_sport');
    }

    public function multi_sport()
    {
        return $this->belongsTo('App\Sport', 'result_multisport');
    }

    public function competition()
    {
        return $this->belongsTo('App\Competition', 'result_competition');
    }

    public function __toString()
    {
        return $this->competition->getCompName();
    }

    /**
     * @return int
     */
    public function getResultId()
    {
        return $this->result_id;
    }

    /**
     * @param int $result_id
     */
    public function setResultId($result_id)
    {
        $this->result_id = $result_id;
    }

    /**
     * @return IUser
     */
    public function getResultAthlete(): IUser
    {
        return $this->athlete;
    }

    /**
     * @param IUser $result_athlete
     */
    public function setResultAthlete(IUser $result_athlete)
    {
        $this->athlete = $result_athlete;
    }

    /**
     * @return IDistance
     */
    public function getResultDistance(): IDistance
    {
        return $this->distance;
    }

    /**
     * @param IDistance $result_distance
     */
    public function setResultDistance(IDistance $result_distance)
    {
        $this->distance = $result_distance;
    }

    /**
     * @return ISport
     */
    public function getResultSport(): ISport
    {
        return $this->sport;
    }

    /**
     * @param ISport $result_sport
     */
    public function setResultSport(ISport $result_sport)
    {
        $this->sport = $result_sport;
    }

    /**
     * @return ISport
     */
    public function getResultMultisport(): ISport
    {
        return $this->multi_sport;
    }

    /**
     * @param ISport $result_multisport
     */
    public function setResultMultisport(ISport $result_multisport)
    {
        $this->multi_sport = $result_multisport;
    }

    /**
     * @return ICompetition
     */
    public function getResultCompetition(): ICompetition
    {
        return $this->competition;
    }

    /**
     * @param ICompetition $result_competition
     */
    public function setResultCompetition(ICompetition $result_competition)
    {
        $this->competition = $result_competition;
    }

    /**
     * @return bool
     */
    public function isDisqualified(): bool
    {
        return $this->disqualified;
    }

    /**
     * @param bool $disqualified
     */
    public function setDisqualified(bool $disqualified)
    {
        $this->disqualified = $disqualified;
    }

    /**
     * @return int
     */
    public function getResultTime(): int
    {
        return $this->result_time;
    }

    /**
     * @param int $result_time
     * @throws \Throwable
     */
    public function setResultTime(int $result_time)
    {
        $this->result_time = $result_time;
        $this->saveOrFail();
    }
}
