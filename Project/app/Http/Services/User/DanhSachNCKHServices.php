<?php

namespace App\Http\Services\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\KhaiBaoNCKH;
use App\Models\User\ChiTietTam;
use App\Models\User\ChiTietHD;
use App\Models\User\GiangVien;
use App\Models\User;
use Illuminate\Support\Arr;

class DanhSachNCKHServices {

  public function listById($id){
    //Lay ten gv tu bang User
    $tenGV = User::where('id', $id)->value('name');
    //Lay MaGiangVien tu bang GiangVien theo TenGiangVien
    $IdGV = GiangVien::where('TenGiangVien', $tenGV)->value('MaGiangVien');
    //Lay cac thuoc tinh hoat dong
    $hd = KhaiBaoNCKH::where('GVKeKhai', $IdGV)->orderByDesc('MaHoatDong')->get();
    // dd($tenGV, $IdGV, $mahd, $hd);
    return $hd;
  }
  public static function listThamGia($id) {
    $thamgia = KhaiBaoNCKH::find($id)->ChiTietHD;
    return $thamgia;
  }
}
