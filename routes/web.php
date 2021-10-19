<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use PhpParser\Node\Expr\FuncCall;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('appointments', 'AppointmentController');
Route::resource('/customer', 'CustomerController');
Route::get('/compaign/{id}', 'CustomerController@compaign');
Route::post('/save-compaign', 'CustomerController@save_compaign')->name('save-compaign');
Route::get('/', 'AdminController@index');
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/profile', [HomeController::class, 'profile']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
