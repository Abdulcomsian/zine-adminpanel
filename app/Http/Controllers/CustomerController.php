<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        try {
            $customers = User::where('role', 'customer')
                ->withCount('appointments')
                ->get();
            return view('customers.view_customer', compact('customers'));
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }

    public function create()
    {
        try {
            return view('customers.add_customer');
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->customer_name;
            $user->email = $request->customer_email;
            $user->phone_number = $request->phone_number;
            $user->role = "customer";
            $user->email_verified_at = date('Y-m-d h:i:s');
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                toastr()->success('Customer Created Successfully!!');
                return back();
            }
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }

    public function compaign($id)
    {
        try {
            $user = User::where('id',$id)->first('compaign_link');
            return view('customers.compaign', compact('id','user'));
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
    public function save_compaign(Request $request)
    {
        try {
            User::find($request->customerid)->update([
                'compaign_link' => $request->link
            ]);
            toastr()->success('Compaign Link save successfully!!!');
            return back();
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
}
