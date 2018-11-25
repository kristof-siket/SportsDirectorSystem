<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ICrudService;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ICrudService $crudService
     * @return \Illuminate\Http\Response
     */
    public function index(ICrudService $crudService)
    {
        if (!(\Auth::check())) {
            return redirect('login');
        } else {
            $recent_comps = $crudService->GetMostRecentCompetitions(3);
            return view('welcome', ['recent_comps' => $recent_comps]);
        }
    }
}
