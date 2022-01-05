<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.25.
 * Time: 9:22
 */

namespace App\Services\HelperClasses;

use App\ModelInterfaces\ISport;

/**
 * Class representing the list of weekly trainings in a Training Plan.
 * @package App\Services\HelperClasses
 */
class TrainingData
{
    /**
     * @var $sport ISport
     */
    protected $sport;

    /**
     * @var string $description
     */
    protected $description;

    /**
     * @var double $kilometers
     */
    protected $kilometers;

    /**
     * @var \DateTime $date
     */
    protected $date;

    /**
     * TrainingData constructor.
     *
     * @param ISport $sport
     * @param string $description
     * @param float $kilometers
     * @param \DateTime $date
     */
    public function __construct(ISport $sport, string $description, float $kilometers, \DateTime $date)
    {
        $this->sport = $sport;
        $this->description = $description;
        $this->kilometers = $kilometers;
        $this->date = $date;
    }

    /**
     * @return ISport
     */
    public function getSport(): ISport
    {
        return $this->sport;
    }

    /**
     * @param ISport $sport
     */
    public function setSport(ISport $sport): void
    {
        $this->sport = $sport;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getKilometers(): float
    {
        return $this->kilometers;
    }

    /**
     * @param float $kilometers
     */
    public function setKilometers(float $kilometers): void
    {
        $this->kilometers = $kilometers;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

}