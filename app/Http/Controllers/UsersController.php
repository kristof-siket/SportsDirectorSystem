<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ICrudService;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @param ICrudService $crudService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, ICrudService $crudService)
    {
        if (!is_integer($request->input('user_team'))) {
            return back();
        }

        $user->setTeam($crudService->FindTeamById($request->input('user_team')));
        $user->save();

        if ($user) {
            return redirect()->route('dashboard');
        }

        return redirect()->back();
    }
}
