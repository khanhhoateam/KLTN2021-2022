<?php

namespace App\Http\Services\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\GiangVien;
use App\Models\Admin\ChiTietMienGiam;
use App\Models\Admin\HocHam;
use App\Models\Admin\MienGiam;
use App\Models\Admin\TongKet;
use App\Models\Admin\KetChuyen;
use App\Models\Admin\DotKeKhai;
use App\Models\User\DanhGia;
use Illuminate\Support\Facades\DB;

class HoSoServices{
  public function getDanhGia($id){
    if (TongKet::where('MaGiangVien',$id)->first()){
      $diemgv = TongKet::where('MaGiangVien',$id)->value('DiemDanhGia');
      $diemdanhgia = DanhGia::get();
      foreach($diemdanhgia as $ddg){
        if($ddg['DiemToiThieu'] < $diemgv && $diemgv <= $ddg['DiemToiDa']){
          return $ddg['XepLoai'];
        }
      }
    }
    else{
      return 'Chưa Đánh Giá';
    }
  }
  public function getKetChuyen($id, $madot){
    $date = DotKeKhai::where('MaDot', $madot)->get()[0]['ThoiGianBatDau'];
    $year = date('Y', strtotime($date));
    $giangvien =  [];
    $tengv = GiangVien::where('MaGiangVien', $id)->value('TenGiangVien');
    $gv =  GiangVien::where('TenGiangVien', $tengv)->get('MaGiangVien');
    foreach($gv as $gv){
        array_push($giangvien, $gv['MaGiangVien']);
    }
    $ketchuyen = KetChuyen::whereIn('IDGiangVien', $giangvien)->where('DiemDu', '!=', 0)->where('HSD' , '>=', $year)->orderBy('IDKetChuyen', 'desc')->get();
    return $ketchuyen;
  }
}