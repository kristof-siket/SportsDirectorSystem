<?php

namespace App\Http\Controllers;

use App\Competition;
use App\CompetitionsDistances;
use App\Distance;
use App\ModelInterfaces\ICompetition;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class CompetitionsController extends Controller
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

        /**
         * @var $comps ICompetition
         */
        $comps = \DB::table('competitions')
            ->orderBy('competitions.comp_date', 'desc')
            ->get();

        return view('competitions.index', ['competitions' => $comps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('competitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!\Auth::check()) {
            return redirect()->route('login');
        }
            $competition = Competition::create([
                "comp_name" => $request->input('comp_name', 'Új verseny'),
                "comp_sport" => $request->input('comp_sport'),
                "comp_date" => $request->input('comp_date', new \DateTime('now')),
                "comp_promoter" => \Auth::user()->id,
                "comp_location" => $request->input('comp_location', 'Budapest'),
            ]);
            if ($competition) {
                flash('Competition created successfully, now you can add distances to it!')->important();
                return redirect()->route('competitions.addDistances', ['comp_id' => $competition->getCompId()]);
            }
            else {
                flash('Competition creation was unsuccessful, please, fill the input fields correctly!')->error();
                return back();
            }
        }

    /**
     * Display the form for adding distances to recently created event.
     *
     * @param $comp_id int
     * @param $request Request
     * @return Response
     */
    public function addDistances($comp_id, Request $request)
    {

        $this_comp = Competition::find($comp_id);
        return view('competitions.add_distances', ['comp' => $this_comp,
            'distances' => Distance::where('sport_id', $this_comp->comp_sport)->get()]);
    }

    public function storeDistances(Request $request, $comp_id)
    {
        $comp_distances = Input::get('comp_distances');
        $competition = Competition::find($comp_id);

        if (!\Auth::check()) {
            return redirect()->route('login');
        }

        foreach ($comp_distances as $comp_distance) {
            CompetitionsDistances::create([
                'competition_id' => $competition->comp_id,
                'distance_id' => $comp_distance
            ]);
        }

        return redirect()->route('competitions.show', ['comp_id' => $competition->comp_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        return view('competitions.details', ['competition' => $competition]);
    }
}
