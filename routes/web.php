<?php

use App\Http\Controllers\CustomPasswordResetLinkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/role', function () {
    return view('role');
});

Route::post('/forget-password', [CustomPasswordResetLinkController::class, 'postEmail']);
Route::get('/reset-password/{token}', 'ResetPasswordController@getPassword');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // if (Auth::user()->email_verified_at) {

        // }
        return view('/template/index');
        // return redirect('user/profile')->with('msg', 'please verify your email and fill out all the account information for the business');
    })->name('index');
});
