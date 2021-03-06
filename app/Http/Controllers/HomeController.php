<?php

namespace App\Http\Controllers;

use App\Events\HomeEvent;
use App\Mail\NewAccess;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        event(new HomeEvent('Hello, World'));
        return view('home');
    }
}
