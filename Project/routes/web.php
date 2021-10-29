<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index',[
        'title' => 'TRANG CHỦ'
    ]);
})->name('index');

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('index');
    });

    include_once app_path() . "/RouteCustom/phuc_routes.php";
    include_once app_path() . "/RouteCustom/hoa_admin_routes.php";

});

Route::prefix('user')->group(function () {

    Route::get('/', function () {
        return view('index');
    });

    include_once app_path() . "/RouteCustom/hoa_user_routes.php";

});