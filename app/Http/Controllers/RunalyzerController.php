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
        $pulses = array();
        $kilometers = array();
        $timestamp = 0.5; // NEVER EVER LIKE THIS...

        $i = 0;
        foreach (AnalyzerResult::all() as $ares) {
            if ($ares->aresult_id % 10 == 0) {
                $pulses[$i] = $ares->aresult_pulse;
                $kilometers[$i] = $ares->aresult_kilometers;
                $i++;
            }
        }

        $tempos = array();
        for ($i = 1; $i < sizeof($kilometers); $i++)
        {
            $tempos[$i] = ($kilometers[$i] - $kilometers[$i - 1]) * (60 / $timestamp) * 60;
        }
        return view('runalyzer.index', ["pulses" => $pulses, "tempos" => $tempos]);
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

        return response('Database content created succesfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
