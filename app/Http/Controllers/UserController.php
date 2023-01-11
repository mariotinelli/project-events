<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Services\FormatDatetimeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * @param \Illuminate\Http\Request
     * @return \Inertia\Response
     */
    public function myEvents(Request $request)
    {

        $pagination = $request->pagination ?? 5;

        if ($pagination === "Todos" ) {
            $pagination = Event::select('events.*', 'event_categories.name as category_name')
                ->join('event_categories', 'events.event_category_id', '=', 'event_categories.id')
                ->where('events.user_id', Auth::user()->id)
                ->count();
        }

        $events = Event::select('events.*', 'event_categories.name as category_name')
            ->join('event_categories', 'events.event_category_id', '=', 'event_categories.id')
            ->where('events.user_id', Auth::user()->id)
            ->paginate($pagination);

        foreach ($events as $event) {
            $event->date = FormatDatetimeService::formatDate($event->date);
            $event->duration = FormatDatetimeService::formatTime($event->duration);
        }

        return Inertia::render('User/MyEvents', ['events' => $events]);
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
