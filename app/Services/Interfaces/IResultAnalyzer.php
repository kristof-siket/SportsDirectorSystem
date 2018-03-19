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
    public function initializeAnalyzerResults($sampleRate, Result $result);

    // TODO: define every service methods needed for the analyzer function
}