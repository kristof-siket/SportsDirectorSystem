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
         * Finds a result by its ID.
         *
         * @param $result_id
         * @return mixed
         */
        public function getResultById($result_id);

        /**
         * Gets every results of a specified user.
         *
         * @param $user_id int
         * @return mixed
         */
        public function getResultsOfUser($user_id);

        /**
         * Gets the full set of pulse data from the analyzer results.
         *
         * @param mixed $result
         * @return mixed
         */
        public function getFullPulseData($result);

        /**
         * Gets the full set of kilometers data from the analyzer results.
         *
         * @param mixed $result
         * @return mixed
         */
        public function getFullKilometerData($result);

        /**
         * Calculates the athlete's tempo (km/h) for every timestamps
         *
         * @param float $sampleRate
         * @param mixed $result
         * @return mixed
         */
        public function getFullTempoData(float $sampleRate, $result);

        /**
         * Gets the result ID of a specified Result object.
         *
         * @param $results mixed
         * @return mixed
         */
        public function getResultsId($results);
    }
}