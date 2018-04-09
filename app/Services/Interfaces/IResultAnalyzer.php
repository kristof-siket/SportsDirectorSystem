<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.03.19.
 * Time: 14:07
 */

namespace App\Services\Interfaces;


use App\Result;

interface IResultAnalyzer
{
    /**
     * Creates sample data for the analyzer results data table.
     * @param $sampleRate float
     * The frequency of records.
     * @param Result $result
     * @return void
     */
    public function initializeAnalyzerResults(float $sampleRate, Result $result);


    /**
     * Gets the full set of pulse data from the analyzer results.
     * @param Result $result
     * @return mixed
     */
    public function getFullPulseData(Result $result);

    /**
     * Gets the full set of kilometers data from the analyzer results.
     * @param Result $result
     * @return mixed
     */
    public function getFullKilometerData(Result $result);

    /**
     * Calculates the athlete's tempo (km/h) for every timestamps
     * @param float $sampleRate
     * @param Result $result
     * @return mixed
     */
    public function getFullTempoData(float $sampleRate, Result $result);

}