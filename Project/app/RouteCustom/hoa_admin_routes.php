<?php

use App\Http\Controllers\Admin\HocHamController;
use App\Http\Controllers\Admin\DotKeKhaiController;
use App\Http\Controllers\Admin\MienGiamController;
use App\Http\Controllers\Admin\TheLoaiController;
use App\Http\Controllers\Admin\XetDuyetNCKHController;
use App\Http\Controllers\Admin\QuanLyGVController ;
use App\Http\Controllers\Admin\ChiTietNCKHController ;

//Admin
Route::prefix('thiet-lap-dinh-muc')->middleware('CheckDotKeKhai')->group(function () {

  Route::get('/', [HocHamController::class, 'create']);

  Route::prefix('hoc-ham')->group(function () {

      Route::get('/', [HocHamController::class, 'create'])->name('hoc-ham');

      Route::post('/', [HocHamController::class, 'temporary_table'])->name('bang-luu-tam-hh');

      Route::get('xoa/{HocHamTamID}', [HocHamController::class, 'del_temp_table'])->name('xoa-hh');

      Route::get('luu', [HocHamController::class, 'store'])->name('luu-hh');

  });

  Route::prefix('mien-giam')->group(function () {

    Route::get('/', [MienGiamController::class, 'create'])->name('mien-giam');

    Route::post('/', [MienGiamController::class, 'temporary_table'])->name('bang-luu-tam-mg');

    Route::get('xoa/{MienGiamTamID}', [MienGiamController::class, 'del_temp_table'])->name('xoa-mg');

    Route::get('luu', [MienGiamController::class, 'store'])->name('luu-mg');

  });

});

Route::prefix('mo-dot-ke-khai')->group(function(){

  Route::get('/', [DotKeKhaiController::class, 'create'])->name('mo-dot-ke-khai');

  Route::post('/', [DotKeKhaiController::class, 'store']);

  Route::get('dong-dot-ke-khai/{id}', [DotKeKhaiController::class, 'close'])->name('dong-dkk');

});

Route::prefix('thiet-lap-the-loai')->middleware('CheckDotKeKhai')->group(function(){

  Route::get('/', [TheLoaiController::class, 'create'])->name('the-loai');

  Route::post('/', [TheLoaiController::class, 'temporary_table'])->name('bang-luu-tam-tl');

  Route::get('xoa/{TheLoaiTamID}', [TheLoaiController::class, 'del_temp_table'])->name('xoa-tl');

  Route::get('luu', [TheLoaiController::class, 'store'])->name('luu-tl');


});

Route::prefix('xet-duyet-nckh')->middleware('CheckDotKeKhai')->group(function(){
  Route::get('/', [XetDuyetNCKHController::class, 'list'])->name('xet-duyet');
  Route::get('/chi-tiet-nckh/{id}', [ChiTietNCKHController::class, 'show'])->name('chi-tiet-nckh');
  Route::post('/chi-tiet-nckh/{id}/sua', [ChiTietNCKHController::class, 'edit'])->name('sua-nckh');
  Route::get('/duyet-nckh/{id}/{value}', [XetDuyetNCKHController::class, 'approve'])->name('duyet-nckh');
});

Route::prefix('danh-sach-nckh')->middleware('CheckDotKeKhai')->group(function(){
  Route::get('/', [XetDuyetNCKHController::class, 'listAll'])->name('danh-sach-nckh');
});

Route::prefix('quan-ly-giang-vien')->middleware('CheckDotKeKhai')->group(function(){
  Route::get('/', [QuanLyGVController::class, 'list']);
  Route::post('/', [QuanLyGVController::class, 'listwithMaDot'])->name('quan-ly-gv');
});
