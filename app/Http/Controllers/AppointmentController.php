<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use App\Notifications\AppointmentCreated;
use App\Utils\HelperFunctions;
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
            'audio' =>'nullable|mimes:audio/mpeg,mpga,mp3,wav,aac'
        ],[
            'user_id.required' => 'Please select any user'
        ]);
        try {
            $input = $request->except('_token','appointment_date','app_time');
            $date = $request['date'];
            $time = $request['time'];
            $input['comments']= str_replace(array("\n", "\r"), ' ', $request['comments']);
            
            $input['contact'] = $request['contact'];
          
            $input['date_time'] = date('Y-m-d H:i:s', strtotime("$date $time"));
            if ($request->file('audio')){
                $input['audio'] = HelperFunctions::saveFile(null,$request->file('audio'),HelperFunctions::appointmentAudioPath());
            }

            $appointment = Appointment::create($input);
            if($appointment->user->fcm_token){
                $appointment->user->notify(new AppointmentCreated($appointment));
            }
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
            $appointment = Appointment::with('user')->findOrFail($request->id);

            $input = $request->except('_token');
            $date = $request['date'];
            $time = $request['time'];
            $input['contact'] = $request['contact'];
            $input['date_time'] = date('Y-m-d H:i:s', strtotime("$date $time"));
            if ($request->file('audio')) {
                $input['audio'] = HelperFunctions::saveFile($appointment->audio, $request->file('audio'), HelperFunctions::appointmentAudioPath());
            }
            $appointment->update($input);

            return back();

        }catch (\Exception $exception){
            return response()->json(['status' => false]);
        }

    }
}
