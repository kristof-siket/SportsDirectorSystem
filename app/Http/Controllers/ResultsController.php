<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Result;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($comp_id)
    {
        $this_results = Result::where('result_competition', $comp_id)
            ->orderBy('result_time', 'desc')
            ->get();

        return view('results.index', ['results' => $this_results]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enter($comp_id, $distance_id)
    {
        if (\Auth::check()) {
            $new_res = Result::create([
                'disqualified' => 0,
                'result_time' => 0,
                'result_athlete' => \Auth::user()->id,
                'result_competition' => $comp_id,
                'result_sport' => Competition::find($comp_id)->comp_sport,
                'result_distance' => $distance_id,
                'result_multisport' => null // TODO: check if competition sport is a multi-sport
            ]);

            if ($new_res) {
                return redirect()->route('results.index', ['comp_id' => $comp_id]);
            } else {
                return redirect()->route('results.index', ['comp_id' => $comp_id]);
            }
        } else {
            return redirect()->route('login');
        }
        // TODO: flash messages
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
    public function update(Request $request, Result $result)
    {
        //
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
