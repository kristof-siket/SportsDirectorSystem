<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.05.06.
 * Time: 18:46
 */

namespace App\Services\Repository\Result {

    /**
     * Interface IResultRepository
     * @package App\Services\Repository
     *
     * Common interface for Repository Pattern above both ORM implementations.
     */
    interface IResultRepository
    {
        public function getCompetitionResults($competition);

        public function getAthleteResults($athlete);

        public function getResultById($result_id);

        // TODO: Create more repo methods.
    }
}