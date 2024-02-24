<?php

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         // 'justLoggedIn' => true,
//     ]);
// });
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

Route::controller(LectureController::class)->group(function () {
    Route::get('/lectures', 'index')->name('lectures.index');
    // Route::post('/lectures', 'store')->name('lectures.store');
    // Route::get('/lectures/{lecture}', 'show')->name('lectures.show');
    // Route::patch('/lectures/{lecture}', 'update')->name('lectures.update');
    // Route::delete('/lectures/{lecture}', 'destroy')->name('lectures.destroy');
});

Route::controller(SubjectController::class)->group(function () {
    // Route::get('/subjects', 'index')->name('subjects.index');
    Route::middleware('auth')->get('/subjects/dashboard', 'dashboard')->name('subjects.dashboard');
    Route::post('/subjects', 'store')->name('subjects.store');
    Route::get('/subjects/{subject}', 'show')->name('subjects.show');
    Route::patch('/subjects/{subject}', 'update')->name('subjects.update');
    Route::put('/subjects/{subject}', 'update')->name('subjects.update');
    Route::delete('/subjects/{subject}', 'destroy')->name('subjects.destroy');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
