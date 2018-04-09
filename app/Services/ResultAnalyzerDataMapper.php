<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.03.20.
 * Time: 19:19
 */

namespace App\Services\Interfaces;


use App\Result;

class ResultAnalyzerDataMapper implements IResultAnalyzer
{

    /**
     * Creates sample data for the analyzer results data table.
     * @param $sampleRate float
     * The frequency of records.
     * @param Result $result
     * @return void
     */
    public function initializeAnalyzerResults(float $sampleRate, Result $result)
    {
        // TODO: Implement initializeAnalyzerResults() method.
    }

    public function getFullResultAnalysis(Result $result)
    {
        // TODO: Implement getFullResultAnalysis() method.
    }
}