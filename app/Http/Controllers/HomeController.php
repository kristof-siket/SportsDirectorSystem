<?php

namespace App\Http\Controllers;


use App\Services\Interfaces\ICrudService;
use App\Team;

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
     * @param ICrudService $crudService
     * @return \Illuminate\Http\Response
     */
    public function index(ICrudService $crudService)
    {
        $user_competitions = $crudService->GetUserCompetitionInfo(\Auth::user());
        $trainingPlans = $crudService->FindTrainingPlansOfCreator(\Auth::user());
        $teams = Team::all();

        if (count($trainingPlans) == 0) {
            $trainingPlans = [];
        }

        return view('dashboard', ['competitions' => $user_competitions, 'trainingPlans' => $trainingPlans, 'teams' => $teams]);
    }
}
