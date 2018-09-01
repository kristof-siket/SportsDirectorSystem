<?php

namespace App\Http\Controllers;

use App\AnalyzerResult;
use App\Result;
use App\Services\Interfaces\IResultAnalyzer;
use App\User;
use Illuminate\Http\Request;

class RunalyzerController extends Controller
{
    /**
     * Loads the index page of the run analyzer module, all possible results are listed.
     *
     * @param IResultAnalyzer $resultAnalyzer
     * @return \Illuminate\Http\Response
     */
    public function index(IResultAnalyzer $resultAnalyzer)
    {
        $results = $resultAnalyzer->getResultRepository()->getAthleteResults(\Auth::id());

        $ids = $resultAnalyzer->getResultsId($results);

        return view('runalyzer.index', ['results' => $results, 'ids' => $ids]);
    }

    /**
     * Create the sample pseudo-random data for the race data analysis.
     *
     * @param IResultAnalyzer $resultAnalyzer
     * @return \Illuminate\Http\Response
     */
    public function create(IResultAnalyzer $resultAnalyzer)
    {
        $result = Result::find(25); // TODO: refactor this hard-coding
        ini_set('max_execution_time', 500);

        $resultAnalyzer->initializeAnalyzerResults(0.5, $result);

        return response('Database content created successfully!');
    }

    /**
     * Displays the output analysis according to the specified settings.
     *
     * @param Request $request
     * @param IResultAnalyzer $resultAnalyzer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, IResultAnalyzer $resultAnalyzer)
    {
        $resultRepo = $resultAnalyzer->getResultRepository();
        $result = $resultRepo->getResultById($request->input('result'));

        if ($request->input('analysis_type') == 'graph')
        {
            $pulses = $resultAnalyzer->getFullPulseData($result);
            $tempos = $resultAnalyzer->getFullTempoData(0.5, $result);

            return view('runalyzer.chart', ['pulses' => $pulses, 'tempos' => $tempos]);
        }

        else
        {
            $stats = $resultAnalyzer->getStatistics($result);
            return view('runalyzer.stats', ['stats' => $stats]);
        }
    }
}
