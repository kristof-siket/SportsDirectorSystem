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

    public function getStatistics($result);

}