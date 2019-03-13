<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fullusername = getUserFullName(auth()->user()->id);

        return view('home', compact('fullusername'));
    }


    public function name(){
        if (Gate::allows('admin-only',auth()->user())){
            return view('name');
        }
        return 'You are not admin';
    }
}
