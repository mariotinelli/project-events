<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display home page with next events.
     *
     * @return \Inertia\Response
     */
    public function index ()
    {
        return Inertia::render('Home');
    }
}
