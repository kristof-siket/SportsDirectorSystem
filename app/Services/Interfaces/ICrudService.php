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
use App\ModelInterfaces\ISport;
use App\ModelInterfaces\ITeam;
use App\ModelInterfaces\IUser;
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
    function GetAllCompetitions(): array;

    /**
     * @param string $name
     * @param int $sport
     * @param \DateTime $date
     * @param int $promoter
     * @param string $location
     */
    function CreateCompetition(string $name, int $sport, \DateTime $date, int $promoter, string $location): void;

    /**
     * @param int $id
     * @return ICompetition|null
     */
    function FindCompById(int $id): ?ICompetition;

    /**
     * @param ISport $sport
     * @return IDistance[]
     */
    function FindAllDistancesForSport(ISport $sport): array;

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
     * @return TrainingPlan|null
     */
    function FindTrainingPlanByCreator(IUser $creator): ?TrainingPlan;

    /**
     * @param int $count
     * @return ICompetition[]
     */
    function GetMostRecentCompetitions(int $count): array;

    /**
     * @param IUser $athlete
     * @param ICompetition $competition
     * @param IDistance $distance
     * @param ISport $sport
     * @param int $time
     */
    function CreateResult(IUser $athlete, ICompetition $competition, IDistance $distance, ISport $sport, int $time): void;

    /**
     * @param int $id
     * @return ITeam|null
     */
    function FindTeamById(int $id): ?ITeam;
}