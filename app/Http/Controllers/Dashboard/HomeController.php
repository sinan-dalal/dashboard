<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

        if ($user = auth()->user()) {
            return view('dashboard');
        }

        return view('welcome');
    }

}
