<?php

use App\Http\Controllers\User\KhaiBaoNCKHController;
use App\Http\Controllers\User\DanhSachNCKHController;

//User
Route::prefix('khai-bao-nckh')->group(function(){
  Route::get('/', [KhaiBaoNCKHController::class, 'create'])->name('nckh');
  
  Route::post('/', [KhaiBaoNCKHController::class, 'store']);

  //bang luu tam
  Route::post('/luu-tam', [KhaiBaoNCKHController::class, 'temp_table'])->name('luu-tam-nckh');

  //xoa bang luu tam
  Route::get('/xoa-luu-tam/{id}', [KhaiBaoNCKHController::class, 'del_temp_table'])->name('xoa-luu-tam-nckh');
  
});

Route::prefix('danh-sach-nckh')->group(function(){
  Route::get('/', [DanhSachNCKHController::class, 'list'])->name('ds-nckh');
});