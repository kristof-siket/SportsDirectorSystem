<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!(\Auth::check())) {
            return redirect('login');
        } else {
            $recent_comps = Competition::all()->take(3);
            return view('welcome', ['recent_comps' => $recent_comps]);
        }
    }
}
