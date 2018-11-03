<?php

namespace App\Http\Controllers;


use App\Team;
use App\TrainingPlan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_competitions = DB::table('competitions')
            ->join('results', 'results.result_competition', '=', 'competitions.comp_id')
            ->join('competitions_distances', 'competitions_distances.competition_id', '=', 'competitions.comp_id')
            ->join('distances', 'distances.distance_id', '=', 'competitions_distances.distance_id')
            ->whereRaw('results.result_athlete = ? AND results.result_distance = distances.distance_id', [\Auth::id()])
            ->distinct()
            ->get();


        $trainingPlans = TrainingPlan::where('tp_creator', \Auth::id())->get();
        $teams = Team::all();

        if (count($trainingPlans) == 0) {
            $trainingPlans = [];
        }
        return view('dashboard', ['competitions' => $user_competitions->toArray(), 'trainingPlans' => $trainingPlans, 'teams' => $teams]);
    }
}
