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
    public function getCompetitionResults($competition)
    {
        // TODO: Implement getCompetitionResults() method.
    }

    /**
     * @param $athlete int
     * @return mixed
     */
    public function getAthleteResults($athlete)
    {
        return Result::where( [ [ 'result_athlete', '=', $athlete ],[ 'result_time', '>', 0 ] ] )->get();
    }

    public function getResultById($result_id)
    {
        return Result::find($result_id);
    }
}