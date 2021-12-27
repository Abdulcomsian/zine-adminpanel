<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Utils\HelperFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\OnboardingLink;
use App\Models\OnboardVideoLink;

class OnboardingController extends BaseController
{
    public function get_onboardlink()
    {
        try {
            $data = OnboardingLink::get();
            if ($data) {
                return $this->sendResponse($data, 'Onboard Link');
            } else {
                return $this->sendResponse('No record Found!');
            }
        } catch (\Exception $exception) {
            return $this->sendError('Something went wrong,try again.');
        }
    }

    public function get_video_links()
    {
        try {
            $data = OnboardVideoLink::get();
            if ($data) {
                return $this->sendResponse($data, 'Video Links');
            } else {
                return $this->sendResponse('No record Found!');
            }
        } catch (\Exception $exception) {
            return $this->sendError('Something went wrong,try again.');
        }
    }
}
