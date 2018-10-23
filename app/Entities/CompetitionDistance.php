<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.04.30.
 * Time: 13:07
 */

namespace App\Entities;


use App\ModelInterfaces\ICompetition;
use App\ModelInterfaces\ICompetitionDistance;
use App\ModelInterfaces\IDistance;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="competitions_distances")
 */
class CompetitionDistance implements ICompetitionDistance
{
    /**
     * @var
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var Competition $competition
     * @ORM\OneToOne(targetEntity="Competition")
     * @ORM\JoinColumn(name="competition_id", referencedColumnName="comp_id")
     */
    protected $competition;

    /**
     * @var Distance $distance
     * @ORM\OneToOne(targetEntity="Distance")
     * @ORM\JoinColumn(name="distance_id", referencedColumnName="distance_id")
     */
    protected $distance;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Competition
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