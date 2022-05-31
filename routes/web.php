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
        return view('/template/index');
    })->name('index');

    // Seller
    Route::get('/product', action: App\Http\Livewire\Products\Index::class)->name('creareProduct');

    Route::get('/product/edit/{id}', action: App\Http\Livewire\Products\Edit::class);



    // Buyer

    // RFQ頁
    Route::get('/RFQ', action: App\Http\Livewire\RFQ\Index::class)->name('creareRFQ');

    // 產品頁
    Route::get('/find_product', action: App\Http\Livewire\Find\Index::class)->name('findProduct');

    Route::get('/find_product/detail/{id}', action: App\Http\Livewire\Find\Detail::class);

    

});
