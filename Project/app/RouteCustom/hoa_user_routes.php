<?php

use App\Http\Controllers\User\KhaiBaoNCKHController;
use App\Http\Controllers\User\DanhSachNCKHController;
use App\Http\Controllers\User\HoSoController;
use App\Http\Controllers\User\KhaiBaoMGController;

//User
Route::prefix('khai-bao-nckh')->group(function(){
  Route::get('/', [KhaiBaoNCKHController::class, 'create_gvtg'])->name('nckh_gvtg');

  Route::get('/chi-tiet-nckh', [KhaiBaoNCKHController::class, 'create'])->name('nckh');
  
  Route::post('/chi-tiet-nckh', [KhaiBaoNCKHController::class, 'store']);

  //bang luu tam
  Route::post('/luu-tam', [KhaiBaoNCKHController::class, 'temp_table'])->name('luu-tam-nckh');

  //xoa bang luu tam
  Route::get('/xoa-luu-tam/{id}', [KhaiBaoNCKHController::class, 'del_temp_table'])->name('xoa-luu-tam-nckh');
  
});

Route::prefix('danh-sach-nckh')->group(function(){
  Route::get('/', [DanhSachNCKHController::class, 'list'])->name('ds-nckh');
});

Route::prefix('ho-so')->group(function(){
  Route::get('/', [HoSoController::class, 'profile'])->name('ho-so');
  Route::post('/sua', [HoSoController::class, 'edit'])->name('sua_ho_so');
});

Route::prefix('khai-bao-mien-giam')->group(function(){
  Route::get('/', [KhaiBaoMGController::class, 'create'])->name('khai_bao_mg');
  Route::post('/', [KhaiBaoMGController::class, 'store']);
  Route::get('xoa/{id}', [KhaiBaoMGController::class, 'delete'])->name('xoa-mg-user');
});
