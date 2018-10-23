<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.04.30.
 * Time: 10:50
 */

namespace App\Entities;


use App\ModelInterfaces\IDistance;
use App\ModelInterfaces\ISport;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="distances")
 */
class Distance implements IDistance
{
    /**
     * @var int $distance_id
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $distance_id;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Sport")
     * @ORM\JoinColumn(name="sport_id", referencedColumnName="sport_id")
     */
    protected $distance_sport;

    /**
     * @var Sport $distance_partsport
     * @ORM\ManyToOne(targetEntity="Sport")
     * @ORM\JoinColumn(name="multi_id", referencedColumnName="sport_id")
     */
    protected $distance_partsport; // if multi

    /**
     * @var string $distance_name
     * @ORM\Column(type="string")
     */
    protected $distance_name;

    /**
     * @var int $distance_kilometers
     * @ORM\Column(type="integer")
     */
    protected $distance_kilometers;

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
        return $this->distance_sport;
    }

    /**
     * @param ISport $distance_sport
     */
    public function setDistanceSport($distance_sport)
    {
        $this->distance_sport = $distance_sport;
    }

    /**
     * @return Sport
     */
    public function getDistancePartsport(): ISport
    {
        return $this->distance_partsport;
    }

    /**
     * @param ISport $distance_partsport
     */
    public function setDistancePartsport(ISport $distance_partsport)
    {
        $this->distance_partsport = $distance_partsport;
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