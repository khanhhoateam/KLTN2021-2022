<?php

use App\Http\Controllers\Admin\HocHamController;

Route::prefix('thiet-lap-dinh-muc')->group(function () {

  Route::get('/', [HocHamController::class, 'create']);

  Route::prefix('hoc-ham')->group(function () {

      Route::get('/', [HocHamController::class, 'create'])->name('hoc-ham');

      Route::post('/', [HocHamController::class, 'temporary_table'])->name('bang-luu-tam');

      Route::get('xoa/{HocHamTamID}', [HocHamController::class, 'del_temp_table'])->name('xoa');

      Route::get('luu', [HocHamController::class, 'store'])->name('luu');

  });

});