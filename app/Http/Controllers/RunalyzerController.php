<?php

namespace App\Http\Controllers;

use App\Result;
use App\Services\Interfaces\IResultAnalyzer;
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
        if (!\Auth::check()) {
            return redirect()->route('login');
        }

        //service calls
        $results = $resultAnalyzer->getResultRepository()->getResultsOfUser(\Auth::id());

        return view('runalyzer.index', ['results' => $results]);
    }

    /**
     * Create the sample pseudo-random data for the race data analysis.
     *
     * @param IResultAnalyzer $resultAnalyzer
     * @return \Illuminate\Http\Response
     */
    public function create(IResultAnalyzer $resultAnalyzer, int $result_id)
    {
        $result = Result::find($result_id);
        ini_set('max_execution_time', 1000);

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
        // Check if the user is authenticated
        if (!\Auth::check()) {
            return redirect()->route('login');
        } // Check if the user selected any result
        else if (!$this->validate($request, ['result' => 'required'])) {
            flash('Please, select a result to analyze.')->warning();
            return back();
        }

        // Get the Results Repository from the Analyzer Service
        $resultRepo = $resultAnalyzer->getResultRepository();

        // Get the selected result by its id
        $result = $resultRepo->getResultById($request->input('result'));

        // Check if there are analyzer data recorded for the specified result
        if (!$resultRepo->checkIfAnalyzerResultDataExist($result)) {
            flash('No analyzer data recorded for the specified result!')->warning();
            return back();
        }

        // Switch services according to selected analysis type.
        switch ($request->input('analysis_type')) {
            case  "graph" :
                {
                    $pulses = $resultRepo->getFullPulseData($result);
                    $tempos = $resultRepo->getFullTempoData(0.5, $result);

                    flash('Analysis graphs created successfully.')->success();
                    return view('runalyzer.chart', ['pulses' => $pulses, 'tempos' => $tempos]);

                }
            case "stat":
                {
                    $stats = $resultAnalyzer->getStatistics($result);

                    flash('Personal statistics calculated successfully.')->success();
                    return view('runalyzer.stats', ['stats' => $stats]);
                }
            case "race_stat":
                {
                    $race_stats = $resultAnalyzer->getOverallCompetitionStatistics($result->getResultCompetition());

                    flash('Overall competition statistics calculated successfully.')->success();
                    return view("runalyzer.race-stats", ['race_stats' => $race_stats, 'competition' => $result->getResultCompetition()]);

                }
            default:
                flash('Unknown service selected, returned to Runalyzer form!')->warning();
                return back();
        }
    }
}
