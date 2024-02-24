<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


class HomeController extends Controller
{
    public function index()
    {
        $justLoggedIn = request()->session()->get('justLoggedIn', false);

        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'justLoggedIn' => $justLoggedIn,
        ]);
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }

}
