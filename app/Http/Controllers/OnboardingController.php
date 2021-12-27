<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OnboardingLink;
use App\Models\OnboardVideoLink;


class OnboardingController extends Controller
{
    public function index()
    {
        $onboardinglink = OnboardingLink::first();
        return view('onboarding.onboardingform', compact('onboardinglink'));
    }
    public function store(Request $request)
    {
        try {
            OnboardingLink::truncate();
            OnboardingLink::create($request->only('link'));
            toastr()->success('Link save successfully');
            return back();
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
    //onboarding vide 
    public function onboarding_video()
    {
        $videolinks = OnboardVideoLink::get();
        return view('onboarding.onboardingvideoform', compact('videolinks'));
    }
    //save video links
    public function onboarding_save_video(Request $request)
    {
        try {
            for ($i = 0; $i < count($request->link); $i++) {
                $model      = new OnboardVideoLink();
                $model->link     = $request->link[$i];
                $model->link_type = $request->link_type[$i];
                $model->save();
            }
            toastr()->success('Video Links Saved Successfully');
            return back();
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
    //delete video link
    public function destroy($id)
    {
        try {
            OnboardVideoLink::where('id', $id)->delete();
            toastSuccess('Link deleted successfully!');
            return back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return back();
        }
    }
}
