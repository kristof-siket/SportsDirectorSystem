<?php

namespace App\Http\Controllers;

use App\Competition;
use App\CompetitionsDistances;
use App\Distance;
use App\User;
use Illuminate\Http\Request;
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
        if(\Auth::check()) {
            $competition = Competition::create([
                "comp_name" => $request->input('comp_name', 'Új verseny'),
                "comp_sport" => $request->input('comp_sport'),
                "comp_date" => $request->input('comp_date', new \DateTime('now')),
                "comp_promoter" => User::all()->first()->id,
                "comp_location" => $request->input('comp_location', 'Budapest'),
            ]);
            if ($competition) {
                return redirect()->route('competitions.addDistances', ['comp_id' => $competition->comp_id]);
            }
            else {
                return redirect()->route('competitions.index');
            }
            // TODO: flash messages
        }

        else {
            return redirect()->route('login');
        }
    }

    /**
     * Display the form for adding distances to recently created event.
     *
     * @param Competition $competition
     * @return
     */
    public function addDistances($comp_id, Request $request)
    {
//        $competition = Competition::find($comp_id);
//        if (\Auth::check()) {
//            foreach ($request->input('comp_distances') as $comp_distance) {
//                CompetitionsDistances::create([
//                    'competition_id' => $competition->comp_id,
//                    'distance_id' => $comp_distance
//                ]);
//            }
//            return redirect()->route('competitions.show', ['comp_id' => $competition->comp_id]);
//        } else {
//            return redirect()->route('login');
//        }

        $this_comp = Competition::find($comp_id);
        return view('competitions.add_distances', ['comp' => $this_comp,
            'distances' => Distance::where('sport_id', $this_comp->comp_sport)->get()]);
    }

    public function storeDistances(Request $request, $comp_id)
    {
        $comp_distances = Input::get('comp_distances');
        $competition = Competition::find($comp_id);
        if (\Auth::check()) {
            foreach ($comp_distances as $comp_distance) {
                CompetitionsDistances::create([
                    'competition_id' => $competition->comp_id,
                    'distance_id' => $comp_distance
                ]);
            }
            return redirect()->route('competitions.show', ['comp_id' => $competition->comp_id]);
        } else {
            return redirect()->route('login');
        }

        // TODO: fix this stuff to work properly...
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        //
    }
}
