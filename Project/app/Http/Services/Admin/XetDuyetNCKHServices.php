<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\KhaiBaoNCKH;

class XetDuyetNCKHServices {

  public function list(){
    return KhaiBaoNCKH::where('TrangThai', 'Chờ duyệt')->orderByDesc('MaHoatDong')->get();
  }
  public static function listThamGia($id) {
    $thamgia = KhaiBaoNCKH::find($id)->ChiTietHD;
    return $thamgia;
  }
  public function approve($id ,$value){
    if($value == 0) {
      KhaiBaoNCKH::where('MaHoatDong', $id)->update(['TrangThai' => 'Đã duyệt']);  
    }
    else{
      KhaiBaoNCKH::where('MaHoatDong', $id)->update(['TrangThai' => 'Không duyệt']);  
    }
  }
}
