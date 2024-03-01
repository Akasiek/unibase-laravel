<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/events', [EventController::class, 'dashboard'])->name('dashboard.events');
    Route::get('/subjects', [SubjectController::class, 'dashboard'])->name('dashboard.subjects');
    Route::get('/lectures', [LectureController::class, 'dashboard'])->name('dashboard.lectures');
    Route::get('/event-types', [EventTypeController::class, 'dashboard'])->name('dashboard.event-types');
});

Route::controller(LectureController::class)->group(function () {
    Route::get('/lectures', 'index')->name('lectures.index');
    Route::post('/lectures', 'store')->name('lectures.store');
    Route::get('/lectures/{lecture}', 'show')->name('lectures.show');
    Route::patch('/lectures/{lecture}', 'update')->name('lectures.update');
    Route::delete('/lectures/{lecture}', 'destroy')->name('lectures.destroy');
});

Route::controller(SubjectController::class)->group(function () {
    Route::get('/subjects', 'index')->name('subjects.index');
    Route::post('/subjects', 'store')->name('subjects.store');
    Route::get('/subjects/{subject}', 'show')->name('subjects.show');
    Route::patch('/subjects/{subject}', 'update')->name('subjects.update');
    Route::put('/subjects/{subject}', 'update')->name('subjects.update');
    Route::delete('/subjects/{subject}', 'destroy')->name('subjects.destroy');
});

Route::controller(EventTypeController::class)->group(function () {
    Route::get('/event-types', 'index')->name('event-types.index');
    Route::post('/event-types', 'store')->name('event-types.store');
    Route::get('/event-types/{eventType}', 'show')->name('event-types.show');
    Route::patch('/event-types/{eventType}', 'update')->name('event-types.update');
    Route::delete('/event-types/{eventType}', 'destroy')->name('event-types.destroy');
});

Route::controller(EventController::class)->group(function () {
    Route::get('/events', 'index')->name('events.index');
    Route::post('/events', 'store')->name('events.store');
    Route::get('/events/{event}', 'show')->name('events.show');
    Route::patch('/events/{event}', 'update')->name('events.update');
    Route::delete('/events/{event}', 'destroy')->name('events.destroy');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
