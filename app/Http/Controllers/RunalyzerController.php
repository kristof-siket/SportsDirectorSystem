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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::where('result_athlete', \Auth::user()->id)
            ->where('result_time', '<>', 0)
            ->get();

        $comps = array();

        $i = 0;
        foreach ($results as $r) {
            $comps[$i] = $r->competition->comp_name;
            $i++;
        }

        return view('runalyzer.index', ['results' => $results, 'labels' => $comps]);
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
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $result = Result::find($request->input('result'));

        $pulses = AnalyzerResult::where('aresult_result', $result->result_id)->pluck('aresult_pulse');
        $kilometers = AnalyzerResult::where('aresult_result', $result->result_id)->pluck('aresult_kilometers');

        $srate = 0.5; // HMM..

        $tempos = array();

        for ($i = 1; $i < sizeof($kilometers); $i++) {
            $tempos[$i-1] = ($kilometers[$i] - $kilometers[$i-1]) / ($srate / 60 / 60);
        }

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
