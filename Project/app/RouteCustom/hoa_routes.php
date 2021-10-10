<?php

use App\Http\Controllers\Admin\HocHamController;


Route::prefix('thiet-lap-dinh-muc')->group(function () {
    Route::get('/', [HocHamController::class, 'create']);
    Route::prefix('hoc-ham')->group(function () {
        Route::get('/', [HocHamController::class, 'create']);
        Route::post('/', [HocHamController::class, 'temporary_table']);
        Route::get('xoa/{HocHamTamID}', [HocHamController::class, 'del_temp_table']);
        Route::get('luu', [HocHamController::class, 'store']);

    });
});
