<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/login', function () {
    return view('login',[
        'title' => 'ĐĂNG NHẬP'
    ]);
});

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('index',[
            'title' => 'TRANG CHỦ'
        ]);
    })->name('index');

    include_once app_path() . "/RouteCustom/phuc_routes.php";
    include_once app_path() . "/RouteCustom/hoa_admin_routes.php";

});

Route::prefix('user')->group(function () {

    Route::get('/', function () {
        return view('indexUser',[
            'title' => 'TRANG CHỦ'
        ]);
    })->name('indexUser');

    include_once app_path() . "/RouteCustom/hoa_user_routes.php";

});