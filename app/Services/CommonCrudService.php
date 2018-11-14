<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.14.
 * Time: 13:13
 */

namespace App\Services;


use App\ModelInterfaces\ICompetition;
use App\ModelInterfaces\IDistance;
use App\ModelInterfaces\ISport;
use App\ModelInterfaces\ITeam;
use App\ModelInterfaces\IUser;
use App\Services\Interfaces\ICrudService;
use App\TrainingPlan;

class CommonCrudService implements ICrudService
{
    /**
     * @return ICompetition[]
     */
    function GetAllCompetitions(): array
    {
        // TODO: Implement GetAllCompetitions() method.
    }

    /**
     * @param string $name
     * @param int $sport
     * @param \DateTime $date
     * @param int $promoter
     * @param string $location
     */
    function CreateCompetition(string $name, int $sport, \DateTime $date, int $promoter, string $location): void
    {
        // TODO: Implement CreateCompetition() method.
    }

    /**
     * @param int $id
     * @return ICompetition|null
     */
    function FindCompById(int $id): ?ICompetition
    {
        // TODO: Implement FindCompById() method.
    }

    /**
     * @param ISport $sport
     * @return IDistance[]
     */
    function FindAllDistancesForSport(ISport $sport): array
    {
        // TODO: Implement FindAllDistancesForSport() method.
    }

    /**
     * @param ICompetition $competition
     * @param IDistance $distance
     */
    function AddDistanceForCompetition(ICompetition $competition, IDistance $distance): void
    {
        // TODO: Implement AddDistanceForCompetition() method.
    }

    /**
     * @param int $id
     * @return IDistance
     */
    function FindDistanceById(int $id): ?IDistance
    {
        // TODO: Implement FindDistanceById() method.
    }

    /**
     * @param IUser $user
     * @return array
     */
    function GetUserCompetitionInfo(IUser $user): array
    {
        // TODO: Implement GetUserCompetitionInfo() method.
    }

    /**
     * @param IUser $creator
     * @return TrainingPlan|null
     */
    function FindTrainingPlanByCreator(IUser $creator): ?TrainingPlan
    {
        // TODO: Implement FindTrainingPlanByCreator() method.
    }

    /**
     * @param int $count
     * @return ICompetition[]
     */
    function GetMostRecentCompetitions(int $count): array
    {
        // TODO: Implement GetMostRecentCompetitions() method.
    }

    /**
     * @param IUser $athlete
     * @param ICompetition $competition
     * @param IDistance $distance
     * @param ISport $sport
     * @param int $time
     */
    function CreateResult(IUser $athlete, ICompetition $competition, IDistance $distance, ISport $sport, int $time): void
    {
        // TODO: Implement CreateResult() method.
    }

    /**
     * @param int $id
     * @return ITeam|null
     */
    function FindTeamById(int $id): ?ITeam
    {
        // TODO: Implement FindTeamById() method.
    }
}