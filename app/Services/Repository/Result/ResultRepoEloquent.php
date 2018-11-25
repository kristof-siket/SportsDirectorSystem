<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.05.06.
 * Time: 19:00
 */

namespace App\Services\Repository\Result;


use App\AnalyzerResult;
use App\ModelInterfaces\ICompetition;
use App\ModelInterfaces\IResult;
use App\Result;

class ResultRepoEloquent implements IResultRepository
{
    /**
     * @param $competition ICompetition
     * @return array
     */
    public function getCompetitionResults($competition)
    {
        $this_results = Result::where('result_competition', $competition->getCompId())
            ->orderBy('result_distance')
            ->orderByRaw('result_time = 0')
            ->orderBy('result_time', 'asc')
            ->distinct('result_athlete')
            ->get();

        return $this_results;
    }

    /**
     * @param $result_id int
     * @return Result|null
     */
    public function getResultById($result_id)
    {
        return Result::find($result_id);
    }

    /**
     * Gets the full set of pulse data from the analyzer results.
     *
     * @param $result Result
     * @return array
     */
    public function getFullPulseData($result)
    {
        $pulses = AnalyzerResult::where('aresult_result', $result->result_id)
            ->pluck('aresult_pulse');

        return $pulses->toArray();
    }

    /**
     * Gets the full set of kilometers data from the analyzer results.
     *
     * @param $result Result
     * @return array
     */
    public function getFullKilometerData($result)
    {
        $kilometers = AnalyzerResult::where('aresult_result', $result->result_id)
            ->pluck('aresult_kilometers');

        return $kilometers;
    }

    /**
     * Calculates the athlete's tempo (km/h) for every timestamps
     *
     * @param float $sampleRate
     * @param mixed $result
     * @return mixed
     */
    public function getFullTempoData(float $sampleRate, $result)
    {
        $kilometers = AnalyzerResult::where('aresult_result', $result->result_id)
            ->pluck('aresult_kilometers');

        $tempos = array();

        for ($i = 1; $i < sizeof($kilometers); $i++) {
            $tempos[$i-1] = ($kilometers[$i] - $kilometers[$i-1]) / ($sampleRate / 60 / 60);
        }

        return $tempos;
    }

    /**
     * @param $user_id int
     * @return array
     */
    public function getResultsOfUser($user_id)
    {
        $results = Result::where('result_athlete', $user_id)
            ->where('result_time', '<>', 0)
            ->get();

        return $results;
    }

    /**
     * Gets the result IDs of each element of a specified Result collection.
     *
     * @param $results array
     * @return mixed
     */
    public function getResultsId($results)
    {
        /**
         * @var Result[] $results
         */
        $ids = $results->pluck('result_id');
        return $ids;
    }

    /**
     * Checks if there was analyzer result data recorded for the specified Result.
     *
     * @param $result IResult
     * @return bool
     */
    public function checkIfAnalyzerResultDataExist($result): bool
    {
        return AnalyzerResult::where('aresult_result', $result->getResultId())->exists();
    }
}