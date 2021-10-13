<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        try {
            return view('appointments.view_appointment');
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
    public function create()
    {
        try {
            $customers = User::where('role', 'customer')->get();
            return view('appointments.add_appointment', ['customers' => $customers]);
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
    public function store(Request $request)
    {
        try {
            $input = $request->except('_token');
            Appointment::create($input);
            toastr()->success('Appointment created successfully');
            return back();
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
}
