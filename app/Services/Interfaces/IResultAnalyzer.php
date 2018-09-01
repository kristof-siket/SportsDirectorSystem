<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.03.19.
 * Time: 14:07
 */

namespace App\Services\Interfaces;


use App\Services\Repository\Result\IResultRepository;

interface IResultAnalyzer
{
    /**
     * Creates sample data for the analyzer results data table.
     *
     * @param $sampleRate float
     * The frequency of records.
     *
     * @param mixed $result
     * The Result entity that this analysis belongs to.
     *
     * @return void
     */
    public function initializeAnalyzerResults(float $sampleRate, $result);

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

    /**
     * Gets the entity repository for Result entity type.
     *
     * @return IResultRepository
     */
    public function getResultRepository();

    /**
     * Gets summarized statistics of a given competition result.
     *
     * @param $result
     * @return mixed
     */
    public function getStatistics($result);

}