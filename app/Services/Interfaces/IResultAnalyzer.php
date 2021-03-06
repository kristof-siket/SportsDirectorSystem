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

    /**
     * Gets summarized statistics of given competition (global stats).
     *
     * @param $competition
     * @return mixed
     */
    public function getOverallCompetitionStatistics($competition);
}