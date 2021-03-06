<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('onboard-link', 'API\OnboardingController@get_onboardlink');
Route::get('onboard-video-link', 'API\OnboardingController@get_video_links');
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('compaign-link', 'API\AppointmentController@compaignLink');
    Route::get('appointments', 'API\AppointmentController@appointments');
    Route::get('appointment/{id}', 'API\AppointmentController@getAppointmentById');
    Route::post('appointment/rating', 'API\AppointmentController@rating');
    Route::get('appointment-history', 'API\AppointmentController@getAppointmentHistory');
    Route::post('update/profile', 'API\UserController@updateProfile');
    Route::post('update/profile/image', 'API\UserController@updateProfileImage');
    Route::post('call', 'API\AppointmentController@callapi');
});
