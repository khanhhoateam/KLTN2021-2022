<?php

use App\Http\Controllers\User\KhaiBaoNCKHController;

//User
Route::prefix('khai-bao-nckh')->group(function(){
  Route::get('/', [KhaiBaoNCKHController::class, 'create'])->name('nckh');
  
  Route::post('/', [KhaiBaoNCKHController::class, 'store']);

  //bang luu tam
  Route::post('/luu-tam', [KhaiBaoNCKHController::class, 'temp_table'])->name('luu-tam-nckh');

  //xoa bang luu tam
  Route::get('/xoa-luu-tam/{id}', [KhaiBaoNCKHController::class, 'del_temp_table'])->name('xoa-luu-tam-nckh');

  //auto complete search
  Route::get('/autocomplete', [KhaiBaoNCKHController::class, 'autocomplete'])->name('autocomplete');
});

