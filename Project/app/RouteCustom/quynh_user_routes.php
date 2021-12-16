<?php

use App\Http\Controllers\User\QuanLyHoSoController;


Route::get('gioi-thieu', function () {
  return view('pages.user.gioithieu.gioithieu',[
      'title' => 'GIỚI THIỆU'
  ]);
})->name('gioi-thieu-user');

Route::prefix('quan-ly-ho-so')->group(function(){
  Route::get('/', [QuanLyHoSoController::class, 'create'])->name('quan-ly-ho-so');
  
  Route::post('/', [QuanLyHoSoController::class, 'update']);
});

?>