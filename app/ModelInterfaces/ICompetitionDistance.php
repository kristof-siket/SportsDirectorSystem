<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.10.17.
 * Time: 17:33
 */

namespace App\ModelInterfaces;


interface ICompetitionDistance
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param mixed $id
     */
    public function setId($id);

    /**
     * @return ICompetition
     */
    public function getCompetition(): ICompetition;

    /**
     * @param ICompetition $competition
     */
    public function setCompetition(ICompetition $competition);

    /**
     * @return IDistance
     */
    public function getDistance(): IDistance;

    /**
     * @param IDistance $distance
     */
    public function setDistance(IDistance $distance);
}