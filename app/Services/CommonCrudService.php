<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.14.
 * Time: 13:13
 */

namespace App\Services;


use App\Competition;
use App\CompetitionsDistances;
use App\Distance;
use App\ModelInterfaces\ICompetition;
use App\ModelInterfaces\IDistance;
use App\ModelInterfaces\IResult;
use App\ModelInterfaces\ISport;
use App\ModelInterfaces\ITeam;
use App\ModelInterfaces\IUser;
use App\Result;
use App\Services\Interfaces\ICrudService;
use App\Team;
use App\TrainingPlan;
use DB;

class CommonCrudService implements ICrudService
{
    /**
     * @return ICompetition[]
     */
    function GetAllCompetitions()
    {
        return Competition::orderBy("comp_date", "desc")->get();
    }

    /**
     * @param string $name
     * @param int $sport
     * @param $date
     * @param int $promoter
     * @param string $location
     * @return ICompetition
     */
    function CreateCompetition(string $name, int $sport, $date, int $promoter, string $location): ICompetition
    {
        return Competition::create([
            'comp_name' => $name,
            'comp_sport' => $sport,
            'comp_date' => $date,
            'comp_promoter' => $promoter,
            'comp_location' => $location
        ]);
    }

    /**
     * @param int $id
     * @return ICompetition|null
     */
    function FindCompById(int $id): ?ICompetition
    {
        return Competition::find($id);
    }

    /**
     * @param ISport $sport
     * @return IDistance[]
     */
    function FindAllDistancesForSport(ISport $sport)
    {
        return Distance::where('sport_id', $sport->getSportId())->get();
    }

    /**
     * @param ICompetition $competition
     * @param IDistance $distance
     */
    function AddDistanceForCompetition(ICompetition $competition, IDistance $distance): void
    {
        $cd = CompetitionsDistances::create(
            [
                'competition_id' => $competition->getCompId(),
                'distance_id' => $distance->getDistanceId()
            ]
        );
    }

    /**
     * @param int $id
     * @return IDistance
     */
    function FindDistanceById(int $id): ?IDistance
    {
        return Distance::find($id);
    }

    /**
     * @param IUser $user
     * @return array
     */
    function GetUserCompetitionInfo(IUser $user): array
    {
        $user_competitions = DB::table('competitions')
            ->join('results', 'results.result_competition', '=', 'competitions.comp_id')
            ->join('competitions_distances', 'competitions_distances.competition_id', '=', 'competitions.comp_id')
            ->join('distances', 'distances.distance_id', '=', 'competitions_distances.distance_id')
            ->whereRaw('results.result_athlete = ? AND results.result_distance = distances.distance_id', [$user->getId()])
            ->distinct()
            ->get();

        return $user_competitions->toArray();
    }

    /**
     * @param int $count
     * @return ICompetition[]
     */
    function GetMostRecentCompetitions(int $count)
    {
        return Competition::orderBy('comp_date', 'desc')->take($count)->get();
    }

    /**
     * @param IUser $athlete
     * @param ICompetition $competition
     * @param IDistance $distance
     * @param ISport $sport
     * @param int $time
     * @return IResult
     */
    function CreateResult(IUser $athlete, ICompetition $competition, IDistance $distance, ISport $sport, int $time): IResult
    {
        return Result::create(
            [
                'result_athlete' => $athlete->getId(),
                'result_competition' => $competition->getCompId(),
                'result_distance' => $distance->getDistanceId(),
                'result_sport' => $sport->getSportId(),
                'result_time' => $time,
                'disqualified' => 0,
                'result_multisport' => null
            ]
        );
    }

    /**
     * @param int $id
     * @return ITeam|null
     */
    function FindTeamById(int $id): ?ITeam
    {
        return Team::find($id);
    }

    /**
     * @param IUser $creator
     * @return TrainingPlan[]
     */
    function FindTrainingPlansOfCreator(IUser $creator): array
    {
        return TrainingPlan::where('tp_creator', $creator->getId())->get()->toArray();
    }

    /**
     * @param IUser $user
     * @param ICompetition $competition
     * @param IDistance $distance
     * @return bool
     */
    public function checkIfUserAlreadyEnteredForComp(IUser $user, ICompetition $competition, IDistance $distance): bool
    {
        $existing_result = Result::where('result_athlete', $user->getId())
            ->where('result_competition', $competition->getCompId())
            ->where('result_distance', $distance->getDistanceId())
            ->get();

        return ($existing_result->isNotEmpty());
    }

    /**
     * @param $id
     * @return mixed
     */
    function FindResultById($id): Result
    {
        return Result::find($id);
    }
}