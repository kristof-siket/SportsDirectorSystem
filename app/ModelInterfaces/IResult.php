<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.10.17.
 * Time: 17:35
 */

namespace App\ModelInterfaces;


interface IResult
{
    /**
     * @return int
     */
    public function getResultId();

    /**
     * @param int $result_id
     */
    public function setResultId($result_id);

    /**
     * @return IUser
     */
    public function getResultAthlete(): IUser;

    /**
     * @param IUser $result_athlete
     */
    public function setResultAthlete(IUser $result_athlete);

    /**
     * @return IDistance
     */
    public function getResultDistance(): IDistance;

    /**
     * @param IDistance $result_distance
     */
    public function setResultDistance(IDistance $result_distance);

    /**
     * @return ISport
     */
    public function getResultSport(): ISport;

    /**
     * @param ISport $result_sport
     */
    public function setResultSport(ISport $result_sport);

    /**
     * @return ISport
     */
    public function getResultMultisport(): ISport;

    /**
     * @param ISport $result_multisport
     */
    public function setResultMultisport(ISport $result_multisport);

    /**
     * @return ICompetition
     */
    public function getResultCompetition(): ICompetition;

    /**
     * @param ICompetition $result_competition
     */
    public function setResultCompetition(ICompetition $result_competition);

    /**
     * @return bool
     */
    public function isDisqualified(): bool;

    /**
     * @param bool $disqualified
     */
    public function setDisqualified(bool $disqualified);

    /**
     * @return int
     */
    public function getResultTime(): int;

    /**
     * @param int $result_time
     */
    public function setResultTime(int $result_time);
}