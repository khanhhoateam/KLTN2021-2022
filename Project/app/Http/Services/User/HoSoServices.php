<?php

namespace App\Http\Services\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\GiangVien;
use App\Models\Admin\ChiTietMienGiam;
use App\Models\Admin\HocHam;
use App\Models\Admin\MienGiam;
use App\Models\Admin\TongKet;
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
      // if ($diemgv >= $xuatsac)
      // {
      //   return 'Xuất Sắc';
      // }
      // else
      // {
      //   $danhgia = DanhGia::where('DiemToiDa','>',$diemgv)->value('XepLoai');
      //   return $danhgia;
      // }
    }
    else{
      return 'Chưa Đánh Giá';
    }
  }
}