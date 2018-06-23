<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.04.30.
 * Time: 10:50
 */

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="results")
 */
class Result
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $result_id;

    /**
     * @var User $result_athlete
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="result_athlete", referencedColumnName="id")
     */
    protected $result_athlete;

    /**
     * @var Distance $result_distance
     * @ORM\ManyToOne(targetEntity="Distance")
     * @ORM\JoinColumn(name="result_distance", referencedColumnName="distance_id")
     */
    protected $result_distance;

    /**
     * @var Sport $result_sport
     * @ORM\ManyToOne(targetEntity="Sport")
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
     * @ORM\ManyToOne(targetEntity="Competition")
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
     * @return User
     */
    public function getResultAthlete(): User
    {
        return $this->result_athlete;
    }

    /**
     * @param User $result_athlete
     */
    public function setResultAthlete(User $result_athlete)
    {
        $this->result_athlete = $result_athlete;
    }

    /**
     * @return Distance
     */
    public function getResultDistance(): Distance
    {
        return $this->result_distance;
    }

    /**
     * @param Distance $result_distance
     */
    public function setResultDistance(Distance $result_distance)
    {
        $this->result_distance = $result_distance;
    }

    /**
     * @return Sport
     */
    public function getResultSport(): Sport
    {
        return $this->result_sport;
    }

    /**
     * @param Sport $result_sport
     */
    public function setResultSport(Sport $result_sport)
    {
        $this->result_sport = $result_sport;
    }

    /**
     * @return Sport
     */
    public function getResultMultisport(): Sport
    {
        return $this->result_multisport;
    }

    /**
     * @param Sport $result_multisport
     */
    public function setResultMultisport(Sport $result_multisport)
    {
        $this->result_multisport = $result_multisport;
    }

    /**
     * @return Competition
     */
    public function getResultCompetition(): Competition
    {
        return $this->result_competition;
    }

    /**
     * @param Competition $result_competition
     */
    public function setResultCompetition(Competition $result_competition)
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
        return $this->getResultCompetition()->getCompName();
    }
}