<?php

namespace App\Http\Controllers;

use App\TrainingPlan;
use Illuminate\Http\Request;

class TrainingPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!\Auth::check()) {
            return redirect()->route('login');
        }
        return view('trainingplan.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainingPlan  $trainingPlan
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingPlan $trainingPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrainingPlan  $trainingPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingPlan $trainingPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainingPlan  $trainingPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingPlan $trainingPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainingPlan  $trainingPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingPlan $trainingPlan)
    {
        //
    }
}
