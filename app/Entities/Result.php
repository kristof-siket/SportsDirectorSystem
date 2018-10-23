<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.04.30.
 * Time: 10:50
 */

namespace App\Entities;


use App\ModelInterfaces\ICompetition;
use App\ModelInterfaces\IDistance;
use App\ModelInterfaces\IResult;
use App\ModelInterfaces\ISport;
use App\ModelInterfaces\IUser;
use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity(repositoryClass="App\Services\Repository\Result\ResultRepoDoctrine")
 * @ORM\Table(name="results")
 */
class Result implements IResult
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $result_id;

    /**
     * @var User $result_athlete
     * @ORM\ManyToOne(targetEntity="User", fetch="EAGER")
     * @ORM\JoinColumn(name="result_athlete", referencedColumnName="id")
     */
    protected $result_athlete;

    /**
     * @var Distance $result_distance
     * @ORM\ManyToOne(targetEntity="Distance", fetch="EAGER")
     * @ORM\JoinColumn(name="result_distance", referencedColumnName="distance_id")
     */
    protected $result_distance;

    /**
     * @var Sport $result_sport
     * @ORM\ManyToOne(targetEntity="Sport", fetch="EAGER")
     * @ORM\JoinColumn(name="result_sport", referencedColumnName="sport_id")
     */
    protected $result_sport;

    /**
     * @var Sport $result_multisport
     * @ORM\ManyToOne(targetEntity="Sport")
     * @ORM\JoinColumn(name="result_sport", referencedColumnName="sport_id")
     */
    protected $result_multisport;

    /**
     * @var Competition $result_competition
     * @ORM\ManyToOne(targetEntity="Competition", fetch="EAGER")
     * @ORM\JoinColumn(name="result_competition", referencedColumnName="comp_id")
     */
    protected $result_competition;

    /**
     * @return mixed
     */
    public function getResultId()
    {
        return $this->result_id;
    }

    /**
     * @param mixed $result_id
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
        return $this->result_athlete;
    }

    /**
     * @param IUser $result_athlete
     */
    public function setResultAthlete(IUser $result_athlete)
    {
        $this->result_athlete = $result_athlete;
    }

    /**
     * @return IDistance
     */
    public function getResultDistance(): IDistance
    {
        return $this->result_distance;
    }

    /**
     * @param IDistance $result_distance
     */
    public function setResultDistance(IDistance $result_distance)
    {
        $this->result_distance = $result_distance;
    }

    /**
     * @return Sport
     */
    public function getResultSport(): ISport
    {
        return $this->result_sport;
    }

    /**
     * @param ISport $result_sport
     */
    public function setResultSport(ISport $result_sport)
    {
        $this->result_sport = $result_sport;
    }

    /**
     * @return Sport
     */
    public function getResultMultisport(): ISport
    {
        return $this->result_multisport;
    }

    /**
     * @param ISport $result_multisport
     */
    public function setResultMultisport(ISport $result_multisport)
    {
        $this->result_multisport = $result_multisport;
    }

    /**
     * @return Competition
     */
    public function getResultCompetition(): ICompetition
    {
        return $this->result_competition;
    }

    /**
     * @param ICompetition $result_competition
     */
    public function setResultCompetition(ICompetition $result_competition)
    {
        $this->result_competition = $result_competition;
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
     */
    public function setResultTime(int $result_time)
    {
        $this->result_time = $result_time;
    }

    /**
     * @var boolean $disqualified
     * @ORM\Column(type="boolean")
     */
    protected $disqualified;

    /**
     * @var int $result_time
     * @ORM\Column(type="bigint")
     */
    protected $result_time;

    public function __toString()
    {
        return
            $this->getResultCompetition()->getCompName() .
            " - " .
            $this->getResultDistance()->getDistanceName() . " " .
            "(" . $this->getResultAthlete()->getFirstName() . " " . $this->getResultAthlete()->getLastName() . ")";
    }
}