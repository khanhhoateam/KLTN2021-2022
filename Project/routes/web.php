<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/login', function () {
    return view('login',[
        'title' => 'ĐĂNG NHẬP'
    ]);
})->middleware('CheckUser');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('CheckLogin')->group(function () {

    Route::get('/', function () {
        return view('index',[
            'title' => 'TRANG CHỦ'
        ]);
    })->name('index');

    include_once app_path() . "/RouteCustom/quynh_admin_routes.php";
    include_once app_path() . "/RouteCustom/hoa_admin_routes.php";

});

Route::prefix('user')->middleware('CheckLogin')->group(function () {

    Route::get('/', function () {
        return view('indexUser',[
            'title' => 'TRANG CHỦ'
        ]);
    })->name('indexUser');

    include_once app_path() . "/RouteCustom/hoa_user_routes.php";
    include_once app_path() . "/RouteCustom/quynh_user_routes.php";

});