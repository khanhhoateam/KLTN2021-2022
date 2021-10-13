<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HocHamController;
use App\Http\Controllers\Admin\DotKeKhaiController;


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
    include_once app_path() . "/RouteCustom/hoa_routes.php";

});