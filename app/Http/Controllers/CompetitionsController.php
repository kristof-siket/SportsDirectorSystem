<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Services\Interfaces\ICrudService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompetitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ICrudService $crudService
     * @return \Illuminate\Http\Response
     */
    public function index(ICrudService $crudService)
    {
        if (!\Auth::check()) {
            return redirect()->route('login');
        }
        $comps = $crudService->GetAllCompetitions();

        return view('competitions.index', ['competitions' => $comps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!\Auth::check()) {
            return redirect()->route('login');
        }

        return view('competitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param ICrudService $crudService
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ICrudService $crudService)
    {
        if (!\Auth::check()) {
            return redirect()->route('login');
        }

        $competition = $crudService->CreateCompetition(
            $request->input('comp_name', 'Új verseny'),
            $request->input('comp_sport'),
            $request->input('comp_date', new \DateTime('now')),
            \Auth::user()->id,
            $request->input('comp_location', 'Budapest')
        );

        if ($competition) {
            flash('Competition created successfully, now you can add distances to it!')->important();
            return redirect()->route('competitions.addDistances', ['comp_id' => $competition->getCompId()]);
        } else {
            flash('Competition creation was unsuccessful, please, fill the input fields correctly!')->error();
            return back();
        }
    }

    /**
     * Display the form for adding distances to recently created event.
     *
     * @param $comp_id int
     * @param ICrudService $crudService
     * @return Response
     */
    public function addDistances($comp_id, ICrudService $crudService)
    {
        if (!\Auth::check()) {
            return redirect()->route('login');
        }

        $this_comp = $crudService->FindCompById($comp_id);
        $distances = $crudService->FindAllDistancesForSport($this_comp->getCompSport());

        return view('competitions.add_distances', ['comp' => $this_comp, 'distances' => $distances]);
    }

    /**
     * @param Request $request
     * @param $comp_id
     * @param ICrudService $crudService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeDistances(Request $request, $comp_id, ICrudService $crudService)
    {
        if (!\Auth::check()) {
            return redirect()->route('login');
        }

        $comp_distances = $request->input('comp_distances');
        $competition = $crudService->FindCompById($comp_id);

        foreach ($comp_distances as $comp_distance) {
            $dist = $crudService->FindDistanceById($comp_distance);
            $crudService->AddDistanceForCompetition($competition, $dist);
        }

        return redirect()->route('competitions.show', ['comp_id' => $competition->getCompId()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        if (!\Auth::check()) {
            return redirect()->route('login');
        }
        return view('competitions.details', ['competition' => $competition]);
    }
}
