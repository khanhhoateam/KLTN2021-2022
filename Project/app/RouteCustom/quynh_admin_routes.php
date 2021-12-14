<?php
use App\Http\Controllers\Admin\DotKeKhaiController;
use App\Http\Controllers\Admin\XetDuyetMGController;

Route::get('gioi-thieu', function () {
  return view('pages.admin.gioithieu1.gioithieu1',[
      'title' => 'GIỚI THIỆU'
  ]);
})->name('gioi-thieu');

Route::get('trang-bao', function () {
  return view('pages.admin.trangbao.trangbao',[
      'title' => 'TRANG BÁO'
  ]);
})->name('trang-bao');

Route::prefix('quan-ly-ho-so')->group(function(){
  Route::get('/', [QuanLyHoSoController::class, 'create'])->name('quan-ly-ho-so');
  
  Route::post('/', [QuanLyHoSoController::class, 'update']);
});


Route::prefix('xet-duyet-mien-giam')->middleware('CheckDotKeKhai')->group(function(){
  Route::get('/', [XetDuyetMGController::class, 'list'])->name('xet-duyet-mien-giam');
  Route::get('/chi-tiet-nckh/{id}', [ChiTietMGController::class, 'show'])->name('chi-tiet-nckh');
  Route::post('/chi-tiet-nckh/{id}/sua', [ChiTietMGController::class, 'edit'])->name('sua-nckh');
  Route::get('/duyet-mien-giam/{id}/{value}', [XetDuyetMGController::class, 'approve'])->name('duyet-mien-giam');
});
?>