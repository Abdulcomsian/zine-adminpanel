<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Carbon\Carbon;
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
            $customers = User::where('role', 'customer')->get();
            $appointments = Appointment::all();
            return view('appointments.index',compact('appointments','customers'));
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
    public function create()
    {
        try {
            $customers = User::where('role', 'customer')->get();
            return view('appointments.create', ['customers' => $customers]);
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
    public function store(Request $request)
    {
        $request->validate([
           'type' => 'required',
           'user_id' => 'required',
           'date' => 'required',
           'time' => 'required',
        ],[
            'user_id.required' => 'Please select any user'
        ]);
        try {
            $input = $request->except('_token','appointment_date','app_time');
            $date = $request['date'];
            $time = $request['time'];
            $input['date_time'] = date('Y-m-d H:i:s', strtotime("$date $time"));
            Appointment::create($input);
            toastr()->success('Appointment created successfully');
            return redirect('appointments');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }

    public function update(Request $request)
    {
        try {
            $input = $request->except('_token');
            $date = $request['date'];
            $time = $request['time'];
            $input['date_time'] = date('Y-m-d H:i:s', strtotime("$date $time"));
            $appointment = Appointment::with('user')->findOrFail($request->id);
            $appointment->update($input);

            return response()->json($appointment);
        }catch (\Exception $exception){
            return response()->json(['status' => false]);
        }

    }
}
