<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ChiTietMienGiam;
use App\Models\Admin\MienGiam;
use App\Http\Services\Admin\DotKeKhaiServices;
use Illuminate\Support\Arr;


class ChiTietMienGiamServices {
  public function store($request){
    $result = ChiTietMienGiam::create([
      'MaGiangVien' => $request->input('MaGiangVien'),
      'ThoiGianBatDau' => $request->input('ThoiGianBatDau'),
      'ThoiGianKetThuc' => $request->input('ThoiGianKetThuc'),
      'TrangThai' => 0,
      'MaMienGiam' => $request->input('MaMienGiam')
    ]);
    return $result;
  }
  public function list($mg_trongdot, $magv){
    $slmg = count($mg_trongdot);
    $check = [];
    for ($i=0; $i < $slmg; $i++) { 
      array_push($check, $mg_trongdot[$i]['MaMienGiam']);
    }
    $result = ChiTietMienGiam::where('MaGiangVien', $magv)->whereIn('MaMienGiam', $check)->whereIn('TrangThai', [0,1,2])->get();
    return $result;
  }
  public function delete($id){
    ChiTietMienGiam::where('MaMienGiam', $id)->update(['TrangThai'=>'3']);
  }

  // Lấy danh sách miễn giảm có trạng thái là 1 (đã duyệt) thông qua Mã giảng viên
  public function getByIDgv($madot, $magv) {
    $mg_trongdot = MienGiam::where('MaDot', $madot)->get();
    $slmg = count($mg_trongdot);
    $check = [];
    for ($i=0; $i < $slmg; $i++) { 
      array_push($check, $mg_trongdot[$i]['MaMienGiam']);
    }
    $result = ChiTietMienGiam::where('MaGiangVien', $magv)->whereIn('MaMienGiam', $check)->where('TrangThai', 1)->get();
    return $result;
  }
}