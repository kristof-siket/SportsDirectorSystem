<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.03.19.
 * Time: 14:12
 */

namespace App\Services;

use App\AnalyzerResult;
use App\Result;
use App\Services\Interfaces\IResultAnalyzer;

class ResultAnalyzerActiveRecord implements IResultAnalyzer
{

    /**
     * Creates sample data for the analyzer results data table.
     * @param $sampleRate float
     * The frequency of records.
     * @param Result $result
     * The Result entity that this analysis belongs to.
     * @return void
     */
    public function initializeAnalyzerResults($sampleRate, Result $result)
    {
        if (AnalyzerResult::all()->isNotEmpty()) {
            AnalyzerResult::truncate();
        }

        $duration = $result->result_time;
        $timestamp = 0.0; // sec
        $position = 0.0; // km
        $pulse = rand(96, 123); // bpm (pulse in the beginning)

        $tempoBase = (float)rand(250, 340) / 10000; // km/timestep
        $freshness = (float)rand(1100, 1200) / 1000;
        $tiring = 0.0;
        $deadlock = rand(($duration * 0.65), ($duration * 0.8)); // The moment of the race where the competitor starts to be tired.
        $raceCondition = (float)rand(900, 950) / 1000;

        while ($timestamp < $duration) {
            $tiring = ($timestamp > $deadlock ? (float)rand(5, 10) : 0) / 100000;
            $raceCondition = (float)(($timestamp > $deadlock - 300000) ? (float)rand(1100, 1200) / 1000 : (float)rand(900, 950) / 1000);

            $newPosition = ($position + (float)($tempoBase * $freshness * $raceCondition) * ((float)rand(980, 1020) / (100000 / $sampleRate)));
            $newPulse = ($pulse < 175 ? rand($pulse - 1, $pulse + 3) : rand($pulse - 2, $pulse + 2));

            AnalyzerResult::create([
                'aresult_result' => $result->result_id,
                'aresult_timestamp' => $timestamp,
                'aresult_kilometers' => $newPosition,
                'aresult_pulse' => $newPulse
            ]);

            $freshness -= $tiring;
            $pulse = $newPulse;
            $position = $newPosition;
            $timestamp += $sampleRate;
        }
    }
}