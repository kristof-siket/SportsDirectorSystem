<?php

namespace App\Http\Controllers;

use App\ModelInterfaces\IResult;
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
    public function create(IResultAnalyzer $resultAnalyzer)
    {
        $result = Result::find(25); // TODO: refactor this hard-coding
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
        if (!$this->validate($request, ['result' => 'required'])) {
            return back()->with(['error' => 'Please, select a result to analyze.']);
        }

        $resultRepo = $resultAnalyzer->getResultRepository();

        /**
         * @var IResult $result
         */
        $result = $resultRepo->getResultById($request->input('result'));

        // Switch services according to selected analysis type.
        switch ($request->input('analysis_type')) {
            case  "graph" :
                {
                    $pulses = $resultRepo->getFullPulseData($result);
                    $tempos = $resultRepo->getFullTempoData(0.5, $result);

                    return view('runalyzer.chart', ['pulses' => $pulses, 'tempos' => $tempos])
                        ->with(['success' => 'Analysis graphs created successfully.']);
                }
            case "stat":
                {
                    $stats = $resultAnalyzer->getStatistics($result);
                    return view('runalyzer.stats', ['stats' => $stats])
                        ->with(['success' => 'Personal statistics calculated successfully.']);
                }
            case "race_stat":
                {
                    $race_stats = $resultAnalyzer->getOverallCompetitionStatistics($result->getResultCompetition());
                    return view("runalyzer.race-stats", ['race_stats' => $race_stats, 'competition' => $result->getResultCompetition()])
                        ->with(['success' => 'Overall competition statistics calculated successfully.']);
                }
            default:
                return back()->with(['error' => 'No service selected!']);
        }
    }
}
