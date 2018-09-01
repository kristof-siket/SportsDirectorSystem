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
        /**
         * Gets all the results of a specific competition.
         *
         * @param $competition
         * @return mixed
         */
        public function getCompetitionResults($competition);

        /**
         * Gets every results of a specific athlete.
         *
         * @param $athlete
         * @return mixed
         */
        public function getAthleteResults($athlete);

        /**
         * Finds a result by its ID.
         *
         * @param $result_id
         * @return mixed
         */
        public function getResultById($result_id);

        // TODO: Create more repo methods.
    }
}