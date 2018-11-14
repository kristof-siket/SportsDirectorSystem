<?php

namespace App\Http\Controllers;

use App\ModelInterfaces\IResult;
use App\Services\Interfaces\ICrudService;
use App\Services\Interfaces\IResultAnalyzer;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $comp_id int
     * @param IResultAnalyzer $resultAnalyzer
     * @param ICrudService $crudService
     * @return \Illuminate\Http\Response
     */
    public function index($comp_id, IResultAnalyzer $resultAnalyzer, ICrudService $crudService)
    {
        if (!\Auth::check()) {
            return redirect()->route('login');
        }
        $this_results = $resultAnalyzer->getResultRepository()
            ->getCompetitionResults($crudService->FindCompById($comp_id));

        $grouped = $this_results->groupBy('result_distance');
        return view('results.index', ['results' => $grouped]);
    }

    /**
     * Stores the result record of the entered athlete with result time 0.
     *
     * @param $comp_id
     * @param $distance_id
     * @param ICrudService $crudService
     * @return \Illuminate\Http\Response
     */
    public function enter($comp_id, $distance_id, ICrudService $crudService)
    {
        if (\Auth::check()) {

            $comp = $crudService->FindCompById($comp_id);
            $dist = $crudService->FindDistanceById($distance_id);
            $result_exists = $crudService->checkIfUserAlreadyEnteredForComp(\Auth::user(), $comp, $dist);

            if ($result_exists) {
                flash('You have already entered to this distance!')->warning();
                return back();
            }

            $comp = $crudService->FindCompById($comp_id);
            $new_res = $crudService->CreateResult(\Auth::user(), $comp, $dist, $comp->getCompSport(), 0);

            if ($new_res) {
                flash('Successfully entered to ' . $comp->getCompName() . '!')->success();
                return redirect()->route('results.index', ['comp_id' => $comp_id]);
            } else {
                flash('Could not enter to competition ' . $comp->getCompName() . '!')->error()->important();
                return redirect()->route('results.index', ['comp_id' => $comp_id]);
            }
        } else {
            flash('You must be logged in to enter competitions!')->info();
            return redirect()->route('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $res_id
     * @param  \Illuminate\Http\Request $request
     * @param ICrudService $crudService
     * @return \Illuminate\Http\Response
     */
    public function update($res_id, Request $request, ICrudService $crudService)
    {
        $this->validate($request, ['result_time' => 'required']);
        /**
         * @var $result IResult
         */
        $result = $crudService->FindResultById($res_id);

        $seconds = strtotime($request->input('result_time')) % 86400;
        $result->setResultTime($seconds);

        flash('Save time was successful!')->success();
        return redirect()->back();
    }
}
