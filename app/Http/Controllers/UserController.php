<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Display profile this user.
     *
     * @return \Inertia\Response
     */
    public function profile()
    {
        return Inertia::render('User/Profile');
    }

    /**
     * Display list events this user.
     *
     * @return \Inertia\Response
     */
    public function myEvents()
    {
        return Inertia::render('User/MyEvents');
    }

    /**
     * Display list of events this user will to participates or has participated.
     *
     * @return \Inertia\Response
     */
    public function participation()
    {
        return Inertia::render('User/Participation');
    }

    /**
     * Display list events this user.
     *
     * @return \Inertia\Response
     */
    public function favoriteEvents()
    {
        return Inertia::render('User/FavoriteEvents');
    }
}
