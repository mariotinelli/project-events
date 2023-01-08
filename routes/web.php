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

Route::prefix('/')->middleware('auth')->group(function () {

    Route::resource('events', EventController::class);
    Route::get('profile', [UserController::class, 'profile'])->name('users.profile');
    Route::get('my-events', [UserController::class, 'myEvents'])->name('users.my-events');
    Route::get('participation', [UserController::class, 'participation'])->name('users.participation');
    Route::get('favorite-events', [UserController::class, 'favoriteEvents'])->name('users.favorite-events');

    Route::post('to-participate', [EventController::class, 'toParticipate'])->name('events.to-participate');
    Route::post('uncheck-event', [EventController::class, 'uncheckEvent'])->name('events.uncheck');
    Route::post('favorite-event', [EventController::class, 'favoriteEvent'])->name('events.favorite');
    // Route::prefix('/')->middleware('can:admin')->group(function () {

    // });
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'title' => 'Dashboard'
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

