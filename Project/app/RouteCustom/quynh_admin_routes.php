<?php

use App\Http\Controllers\Admin\GiangVienController;
use App\Http\Controllers\Admin\NCKHController;

Route::get('/gioi-thieu', function () {
  return view('pages.admin.gioithieu.gioithieu',[
      'title' => 'GIỚI THIỆU'
  ]);
})->name('gioi-thieu');

Route::prefix('quan-ly-nckh')->group(function(){

  Route::get('/', [NCKHController::class, 'view'])->name('quan-ly-nckh');

  Route::post('xoa-chon', [NCKHController::class, 'delete_more'])->name('xoa-chon-hd');

  Route::get('xoa/{HoatDongID}', [NCKHController::class, 'delete'])->name('xoa-hd');
  
  Route::get('sua/{HoatDongID}', [NCKHController::class, 'update'])->name('sua-hd');
});


