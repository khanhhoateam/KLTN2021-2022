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

        Route::get('hoc-ham', [HocHamController::class, 'create']);

        Route::post('hoc-ham', [HocHamController::class, 'temporary_save']);

        Route::post('hocham/luu', [HocHamController::class, 'store']);
        
    });
    
});
