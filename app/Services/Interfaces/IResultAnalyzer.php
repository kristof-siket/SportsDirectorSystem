<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.03.19.
 * Time: 14:07
 */

namespace App\Services\Interfaces;


interface IResultAnalyzer
{
    /**
     * Creates sample data for the analyzer results data table.
     * @return void
     */
    public function initializeAnalyzerResults();

    // TODO: define every service methods needed for the analyzer function
}