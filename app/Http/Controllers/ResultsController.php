<?php

namespace App\Http\Controllers;

use App\Competition;
use App\ModelInterfaces\IResult;
use App\Result;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param $comp_id int
     */
    public function index($comp_id)
    {
        if (!\Auth::check()) {
            return redirect()->route('login');
        }

        /**
         * @var $this_results IResult[]
         */
        $this_results = Result::where('result_competition', $comp_id)
            ->orderBy('result_distance')
            ->orderByRaw('result_time = 0')
            ->orderBy('result_time', 'asc')
            ->distinct('result_athlete')
            ->get();

        $grouped = $this_results->groupBy('result_distance');
        return view('results.index', ['results' => $grouped]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Stores the result record of the entered athlete with result time 0.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enter($comp_id, $distance_id)
    {
        if (\Auth::check()) {

            $existing_result = Result::where('result_athlete', \Auth::user()->id)
                ->where('result_competition', $comp_id)
                ->where('result_distance', $distance_id)
                ->get();

            if ($existing_result->isNotEmpty()) {
                flash('You have already entered to this distance!')->warning();
                return redirect()->route('competitions.index');
            }

            $comp = Competition::find($comp_id);

            $new_res = Result::create([
                'disqualified' => 0,
                'result_time' => 0,
                'result_athlete' => \Auth::user()->id,
                'result_competition' => $comp_id,
                'result_sport' => $comp->comp_sport,
                'result_distance' => $distance_id,
                'result_multisport' => null
            ]);

            if ($new_res) {
                flash('Successfully entered to ' . $comp->comp_name . '!')->success();
                return redirect()->route('results.index', ['comp_id' => $comp_id]);
            } else {
                flash('Could not enter to competition ' . $comp->comp_name . '!')->error()->important();
                return redirect()->route('results.index', ['comp_id' => $comp_id]);
            }
        } else {
            flash('You must be logged in to enter competitions!')->info();
            return redirect()->route('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update($comp_id, $res_id, Request $request)
    {
        $this->validate($request, ['result_time' => 'required']);
        /**
         * @var $result Result
         */
        $result = Result::find($res_id);

        $seconds = strtotime($request->input('result_time')) % 86400;

        $result->setResultTime($seconds);
        $result->save();

        flash('Save time was successful!')->success();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
