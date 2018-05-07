<?php

namespace App\Http\Controllers;

use App\AnalyzerResult;
use App\Result;
use App\Services\Interfaces\IResultAnalyzer;
use Illuminate\Http\Request;

class RunalyzerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IResultAnalyzer $resultAnalyzer
     * @return \Illuminate\Http\Response
     */
    public function index(IResultAnalyzer $resultAnalyzer)
    {
        $results = $resultAnalyzer->getResultsOfUser(\Auth::id());
        $ids = $resultAnalyzer->getResultsId($results);
        return view('runalyzer.index', ['results' => $results, 'ids' => $ids]);
    }

    /**
     * Create the sample data for the race data analysis.
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
     * @param Request $request
     * @param IResultAnalyzer $resultAnalyzer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, IResultAnalyzer $resultAnalyzer)
    {
        $resultRepo = $resultAnalyzer->getResultRepository();

        $result = $resultRepo->getResultById($request->input('result'));

        $pulses = $resultAnalyzer->getFullPulseData($result);

        $tempos = $resultAnalyzer->getFullTempoData(0.5, $result);

        return view('runalyzer.chart', ['pulses' => $pulses, 'tempos' => $tempos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
