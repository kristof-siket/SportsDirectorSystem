<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.05.06.
 * Time: 19:00
 */

namespace App\Services\Repository\Result;


use App\Result;
use App\User;

class ResultRepoEloquent implements IResultRepository
{
    /**
     * @param $competition int
     * @return array
     */
    public function getCompetitionResults($competition)
    {
        return Result::where( [ [ 'result_competition', '=', $competition ], [ 'result_time', '>', 0 ] ] )->get();
    }

    /**
     * @param $athlete int
     * @return array
     */
    public function getAthleteResults($athlete)
    {
        return Result::where( [ [ 'result_athlete', '=', $athlete ], [ 'result_time', '>', 0 ] ] )->get();
    }

    /**
     * @param $result_id int
     * @return Result|null
     */
    public function getResultById($result_id)
    {
        return Result::find($result_id);
    }
}