<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.04.30.
 * Time: 10:49
 */

namespace App\Entities;

use App\ModelInterfaces\ICompetition;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="competitions")
 */
class Competition implements ICompetition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $comp_id;

    /**
     * @ORM\ManyToOne(targetEntity="Sport")
     * @ORM\JoinColumn(name="comp_sport", referencedColumnName="sport_id")
     */
    protected $comp_sport;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="comp_promoter", referencedColumnName="id")
     */
    protected $comp_promoter;

    /**
     * One competition has many results.
     * @ORM\OneToMany(targetEntity="Result", fetch="LAZY", mappedBy="result_competition")
     */
    protected $comp_results;

    /**
     * One competition has many distances (many-to-many resolved by connector table).
     * @ORM\OneToMany(targetEntity="CompetitionDistance", fetch="EXTRA_LAZY", mappedBy="competition_id")
     */
    protected $comp_distances;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $comp_name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $comp_date;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $comp_location;

    public function __construct()
    {
        $this->comp_results = new ArrayCollection();
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
     * @return Sport
     */
    public function getCompSport()
    {
        return $this->comp_sport;
    }

    /**
     * @param Sport $comp_sport
     */
    public function setCompSport($comp_sport)
    {
        $this->comp_sport = $comp_sport;
    }

    /**
     * @return User
     */
    public function getCompPromoter()
    {
        return $this->comp_promoter;
    }

    /**
     * @param User $comp_promoter
     */
    public function setCompPromoter($comp_promoter)
    {
        $this->comp_promoter = $comp_promoter;
    }

    /**
     * @return mixed
     */
    public function getCompResults()
    {
        return $this->comp_results;
    }

    /**
     * @param mixed $comp_results
     */
    public function setCompResults($comp_results)
    {
        $this->comp_results = $comp_results;
    }

    /**
     * @return mixed
     */
    public function getCompDistances()
    {
        return $this->comp_distances;
    }

    /**
     * @param mixed $comp_distances
     */
    public function setCompDistances($comp_distances)
    {
        $this->comp_distances = $comp_distances;
    }

    /**
     * @return mixed
     */
    public function getCompName()
    {
        return $this->comp_name;
    }

    /**
     * @param mixed $comp_name
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
        return $this->comp_date;
    }

    /**
     * @param mixed $comp_date
     */
    public function setCompDate($comp_date)
    {
        $this->comp_date = $comp_date;
    }

    /**
     * @return mixed
     */
    public function getCompLocation()
    {
        return $this->comp_location;
    }

    /**
     * @param mixed $comp_location
     */
    public function setCompLocation($comp_location)
    {
        $this->comp_location = $comp_location;
    }


}