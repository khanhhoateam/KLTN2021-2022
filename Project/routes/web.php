<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HocHamController;

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

Route::prefix('admin')->group(function () {
    Route::prefix('thiet_lap_dinh_muc_hoc_ham')->group(function () {
        Route::get('them',[HocHamController::class, 'edit']);  
        Route::post('them',[HocHamController::class, 'store']);  

    });
});


