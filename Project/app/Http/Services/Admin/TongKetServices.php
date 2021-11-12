<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TongKet;

class TongKetServices {

  public static function getDiemDanhGia ($id){
    return TongKet::where('MaGiangVien', $id)->value('DiemDanhGia');
  }

};