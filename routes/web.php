<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CustomPasswordResetLinkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Middleware\VerifiedCheck;
use App\TokenStore\TokenCache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/check', [HomeController::class, 'check']);

Route::get('/role', function () {
    return view('role');
});

Route::post('/forget-password', [CustomPasswordResetLinkController::class, 'postEmail']);

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('/storeNewPassword', [ResetPasswordController::class, 'storeNewPassword']);


Route::get('/signin', [AuthController::class, 'signin']);
Route::get('/callback', [AuthController::class, 'callback']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->middleware([VerifiedCheck::class])->group(function () {

    Route::get('/auth_check', [HomeController::class, 'check']);

    Route::get('/dashboard', function () {
        return view('/template/index');
    })->name('index');

    // Seller
    Route::get('/product', action: App\Http\Livewire\Products\Index::class)->name('createProduct');

    Route::get('/find_rfq', action: App\Http\Livewire\FindRfq\Index::class)->name('findRFQ');
    Route::get('/find_rfq/detail/{id}', action: App\Http\Livewire\FindRfq\Detail::class);


    // Buyer

    // RFQ頁
    Route::get('/RFQ', action: App\Http\Livewire\RFQ\Index::class)->name('creareRFQ');

    // 產品頁
    Route::get('/find_product', action: App\Http\Livewire\Find\Index::class)->name('findProduct');

    Route::get('/find_product/detail/{id}', action: App\Http\Livewire\Find\Detail::class);

    // Notification
    Route::get('/notification', action: App\Http\Livewire\Notification\Index::class)->name('notification');
    Route::get('/notification/detail/{id}', action: App\Http\Livewire\Notification\Detail::class);


    // lawyer
    Route::get('/case/create', action: App\Http\Livewire\Groups\Create::class)->name('group.create');
    Route::get('/case/management/edit/{id}', action: App\Http\Livewire\Groups\Edit::class);
    Route::get('/case/management', action: App\Http\Livewire\Groups\Index::class)->name('group.index');

    Route::put('/switchGroup', [App\Http\Livewire\Groups\SwitchGroup::class, 'update'])->name('group.switchGroup');

    // 查看所有當前接受的case
    Route::get('/list', action: App\Http\Livewire\Case\Index::class)->name('deal:index');

    // microsoft驗證流程
    Route::get('/signout', [AuthController::class, 'signout']);

    // scheduler
    Route::get('/scheduler',  action: App\Http\Livewire\Calendar\Index::class);
    Route::get('/scheduler/new', action: App\Http\Livewire\Calendar\Create::class);
    Route::get('/scheduler/{id}', action: App\Http\Livewire\Calendar\Edit::class);

    // document management
    Route::get('/document_management' ,action: App\Http\Livewire\FileManagement\Index::class)->name('management:index');
});
