<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Self_;

class AppointmentController extends BaseController
{
    public function appointments(){
        try {
            $appointments = self::appointmentBetweenDate(Carbon::now()->subYear(),Carbon::now()->addYear())->get();
            return $this->sendResponse($appointments);
        }catch (\Exception $exception){
            return $this->sendError('Something went wrong,try again.');
        }
    }

    public function getAppointmentById($id){
        try {
            $appointment = Appointment::where('id',$id)
                ->where('user_id',auth()->id())
                ->with('ratings',function ($query){
                    $query->select('rateable_id','rating');
                })
                ->get();
            return $this->sendResponse($appointment);
        }catch (\Exception $exception){
            return $this->sendError('Something went wrong,try again.');
        }
    }

    public function rating(Request $request){
        $request->validate([
           'rate' => 'required',
           'id' => 'required'
        ]);
        try {
            $appointment = Appointment::find($request->id);

            if (!empty($appointment) && $appointment->timesRated() == 0 ){
                $appointment->rate($request->rate);
                $appointment->user_review = $request->user_review;
                $appointment->save();

                return $this->sendResponse(null,'Rating added successfully!' );
            }else{
                return $this->sendError('Rating denied.');
            }
        }catch (\Exception $exception){
            return $this->sendError('Something went wrong,try again.');
        }
    }

    private function appointmentBetweenDate($fromDate,$toDate){
        try {
            return auth()->user()->appointments()
                ->select('id','date_time','type')
                ->whereBetween('date_time',[$fromDate,$toDate]);
        }catch (\Exception $exception){
            return $this->sendError('Something went wrong,try again.');
        }
    }

    public function getAppointmentHistory(){
        try {
            $weeklyAppointments = self::appointmentBetweenDate(Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek())->count();
            $monthlyAppointments = self::appointmentBetweenDate(Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth())->count();
            $toDateAppointments = auth()->user()->appointments()->count();
            $data = [
                'weeklyAppointments' => $weeklyAppointments,
                'monthlyAppointments' => $monthlyAppointments,
                'toDateAppointments' => $toDateAppointments,
            ];
            return $this->sendResponse($data,null );
        }catch (\Exception $exception){
            return $this->sendError('Something went wrong,try again.');
        }
    }
}
