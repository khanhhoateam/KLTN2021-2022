<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HocHamController;


Route::get('/', function () {
    return view('index');
});
Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('home');
    });

    include_once app_path() . "/RouteCustom/phuc_routes.php";
    include_once app_path() . "/RouteCustom/hoa_routes.php";

});
