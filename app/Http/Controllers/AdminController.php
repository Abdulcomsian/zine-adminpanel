<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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

    public function index()
    {
        $totalcustomers = User::where('role', 'customer')->count();
        $total_app = Appointment::count();
        return view('home.dashboard', compact('totalcustomers', 'total_app'));
    }
    public function dashboard()
    {
        $totalcustomers = User::where('role', 'customer')->count();
        $total_app = Appointment::count();
        return view('home.dashboard', compact('totalcustomers', 'total_app'));
    }
}
