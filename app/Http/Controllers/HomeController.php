<?php

namespace App\Http\Controllers;

use App\Ccie;
use App\Event;
use App\Rack;
use App\User;
use Illuminate\Support\Facades\DB;
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
        // dd(123);
        return redirect('/login');
        // return view('home');
    }

    public function Dashboard()
    {
        $data = Event::all();
        $users = User::where('role_id', '!=', 1)->get();
        $ccies = Ccie::all();
        $racks = Rack::all();
        return view('AdminDashboard.Dashboard', compact('data', 'users', 'ccies', 'racks'));
    }
}
