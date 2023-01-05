<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// About
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::prefix('/')->middleware('auth')->group(function () {

    // Route::prefix('/')->middleware('can:admin')->group(function () {

    // });
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'title' => 'Dashboard'
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

