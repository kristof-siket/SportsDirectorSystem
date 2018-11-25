<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.14.
 * Time: 12:15
 */

namespace App\Services\Interfaces;

use App\ModelInterfaces\ICompetition;
use App\ModelInterfaces\IDistance;
use App\ModelInterfaces\IResult;
use App\ModelInterfaces\ISport;
use App\ModelInterfaces\ITeam;
use App\ModelInterfaces\IUser;
use App\Result;
use App\TrainingPlan;

/**
 * Interface ICrudService
 * @package App\Services\Interfaces
 *
 * Provides common CRUD functionality for the application.
 */
interface ICrudService
{
    /**
     * @return ICompetition[]
     */
    function GetAllCompetitions();

    /**
     * @return ISport[]
     */
    function GetAllSports();

    /**
     * @param string $name
     * @param int $sport
     * @param $date
     * @param int $promoter
     * @param string $location
     * @return ICompetition
     */
    function CreateCompetition(string $name, int $sport, $date, int $promoter, string $location): ICompetition;

    /**
     * @param int $id
     * @return ICompetition|null
     */
    function FindCompById(int $id): ?ICompetition;

    /**
     * @param ISport $sport
     * @return IDistance[]
     */
    function FindAllDistancesForSport(ISport $sport);

    /**
     * @param ICompetition $competition
     * @param IDistance $distance
     */
    function AddDistanceForCompetition(ICompetition $competition, IDistance $distance): void;

    /**
     * @param int $id
     * @return IDistance
     */
    function FindDistanceById(int $id): ?IDistance;

    /**
     * @param IUser $user
     * @return array
     */
    function GetUserCompetitionInfo(IUser $user): array;

    /**
     * @param IUser $creator
     * @return TrainingPlan[]
     */
    function FindTrainingPlansOfCreator(IUser $creator): array;

    /**
     * @param int $count
     * @return ICompetition[]
     */
    function GetMostRecentCompetitions(int $count);

    /**
     * @param IUser $athlete
     * @param ICompetition $competition
     * @param IDistance $distance
     * @param ISport $sport
     * @param int $time
     * @return IResult
     */
    function CreateResult(IUser $athlete, ICompetition $competition, IDistance $distance, ISport $sport, int $time): ?IResult;

    /**
     * @param int $id
     * @return ITeam|null
     */
    function FindTeamById(int $id): ?ITeam;

    /**
     * @param IUser $user
     * @param ICompetition $competition
     * @param IDistance $distance
     * @return bool
     */
    function checkIfUserAlreadyEnteredForComp(IUser $user, ICompetition $competition, IDistance $distance): bool;

    /**
     * @param $id
     * @return mixed
     */
    function FindResultById($id): Result;
}