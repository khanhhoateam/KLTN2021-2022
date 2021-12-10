<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\KhaiBaoNCKH;
use App\Models\User\ChiTietHD;
use App\Models\Admin\TheLoai;

class ChiTietNCKHServices {
  public function getNCKH_byID($id){
    $result = KhaiBaoNCKH::where('MaHoatDong', $id)->get();
    return $result;
  }
  public static function GetDiemNC($mahd, $magv) {
    $result = ChiTietHD::where('MaHoatDong', $mahd)
                      ->where('MaGiangVien', $magv)
                      ->value('GioNC');
    return $result;                      
  }
  public function GetChiTietNCKH($idhd) {
    $result = ChiTietHD::where('MaHoatDong', $idhd)->get();
    return $result;
  }
  public function SuaNCKH($request) {
    KhaiBaoNCKH::where("MaHoatDong", $request['mhd'])->update([
        'TrangThai' => $request['tt'],
        'TenHD' => $request['thd'],
        'MaTheLoai' => TheLoai::where('TenTheLoai', $request['theloai'])->value('MaTheLoai'),
        'HanSuDung' => $request['hsd'],
        'MoTa' => $request['mt']
      ]);
  }
}