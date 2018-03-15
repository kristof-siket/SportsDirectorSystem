<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Result;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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
        $user_competitions = new Collection();

        $results = Result::where('result_athlete', \Auth::user()->id);

        foreach ($results as $r)
        {
            $user_competitions->push(Competition::find($r->comp_id));
        }

        return view('dashboard', ['competitions' => $user_competitions]);
    }
}
