<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HocHamController;
use App\Http\Controllers\Admin\DotKeKhaiController;
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
        return view('admin.index',[
            'title'=>'Home'
        ]);
    })->name('admin');

    //Thiet lap dinh muc hoc ham
    Route::prefix('thiet-lap-dinh-muc')->group(function () {

        Route::get('/', [HocHamController::class, 'create']);

        Route::prefix('hoc-ham')->group(function () {

            Route::get('/', [HocHamController::class, 'create'])->name('thiet-lap-hoc-ham');

            Route::post('/', [HocHamController::class, 'temporary_table']);

            Route::get('xoa/{HocHamTamID}', [HocHamController::class, 'del_temp_table']);

            Route::get('luu', [HocHamController::class, 'store']);

        });
        
    });

    //Mo dot ke khai
    Route::prefix('mo-dot-ke-khai')->group(function(){
        Route::get('/', [DotKeKhaiController::class, 'create'])->name("mo-dot-ke-khai");
        Route::post('/', [DotKeKhaiController::class, 'store']);
    });
    
});
