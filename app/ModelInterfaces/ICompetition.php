<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.10.17.
 * Time: 17:33
 */

namespace App\ModelInterfaces;


interface ICompetition
{
    /**
     * @return int
     */
    public function getCompId();

    /**
     * @param int $comp_id
     */
    public function setCompId($comp_id);

    /**
     * @return ISport
     */
    public function getCompSport();

    /**
     * @param ISport $comp_sport
     */
    public function setCompSport($comp_sport);

    /**
     * @return IUser
     */
    public function getCompPromoter();

    /**
     * @param IUser $comp_promoter
     */
    public function setCompPromoter($comp_promoter);

    /**
     * @return IResult[]
     */
    public function getCompResults();

    /**
     * @return IDistance[]
     */
    public function getCompDistances();

    /**
     * @return string
     */
    public function getCompName();

    /**
     * @param string $comp_name
     */
    public function setCompName($comp_name);

    /**
     * @return mixed
     */
    public function getCompDate();

    /**
     * @param mixed $comp_date
     */
    public function setCompDate($comp_date);

    /**
     * @return string
     */
    public function getCompLocation();

    /**
     * @param string $comp_location
     */
    public function setCompLocation($comp_location);
}