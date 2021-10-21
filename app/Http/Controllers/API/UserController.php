<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Utils\HelperFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'phone_number' => ['required'],
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        try {
            $user = auth()->user();

            $user['name'] = $request->name;
            $user['password'] = bcrypt($request->password);
            $user['phone_number'] = $request->phone_number;

            $user->save();
            return $this->sendResponse(null,'Profile Updated Successfully!');

        }catch (\Exception $exception){
            return $this->sendError('Something went wrong,try again.');
        }
    }

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'image' => 'required|file|image|mimes:png,webp,jpg|max:2000',
        ]);

        try {
            $user = auth()->user();
            $filePath = HelperFunctions::profileImagePath();
            $user['image'] = HelperFunctions::saveFile($user->image,$request->file('image'),$filePath);

            $user->save();
            return $this->sendResponse($user['image'],'Profile Image Updated Successfully!');
        } catch (\Exception $e) {
            return $this->sendError('Something went wrong,try again.');
        }
    }
}
