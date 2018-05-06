<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.05.06.
 * Time: 19:00
 */

namespace App\Services\Repository\Result;


use App\Services\ORMServices\DoctrineService;

class ResultRepoDoctrine extends DoctrineService implements IResultRepository
{
    public function getCompetitionResults($competition)
    {
        // TODO: Implement getCompetitionResults() method.
    }

    public function getAthleteResults($athlete)
    {
        // TODO: Implement getAthleteResults() method.
    }

    public function getResultById($result_id)
    {
        // TODO: Implement getResultById() method.
    }
}