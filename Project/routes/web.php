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
    Route::get('/', function () {
        return view('admin.home');
    });

    Route::prefix('thiet-lap-dinh-muc')->group(function () {

        Route::get('/', [HocHamController::class, 'create']);
        Route::get('/test', [HocHamController::class, 'createtest']);

        Route::prefix('hoc-ham')->group(function () {

            Route::get('/', [HocHamController::class, 'create']);

            Route::post('/', [HocHamController::class, 'temporary_table']);

            Route::get('xoa/{HocHamTamID}', [HocHamController::class, 'del_temp_table']);

            Route::get('luu', [HocHamController::class, 'store']);

    });

});
