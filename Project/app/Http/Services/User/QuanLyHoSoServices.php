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


class QuanLyHoSoServices{
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
  public function getMaGV($id){
    return GiangVien::where('UserID',$id)->value('MaGiangVien');
  }

  public function list($id){
    return GiangVien::where('UserID',$id)->get();
  }
  

  public function getHocHam($id){
    return GiangVien::find($id)->HocHam;
  }

  public function getIDMienGiam($id){
    return ChiTietMienGiam::where('MaGiangVien',$id)->value('MaMienGiam');
  }

  public function getMienGiam($id){
    return MienGiam::where('MaMienGiam',$id)->get();
  }

  public function getDanhGia($id){
    if (TongKet::where('MaGiangVien',$id)->first()){
      $diemgv = TongKet::where('MaGiangVien',$id)->value('DiemDanhGia');
      $xuatsac = DB::table('DanhGia')->max('DiemToiDa');
      if ($diemgv >= $xuatsac)
      {
        return 'Xuất Sắc';
      }
      else
      {
        $danhgia = DanhGia::where('DiemToiDa','>',$diemgv)->value('XepLoai');
        return $danhgia;
      }
    }
    else{
      return 'Chưa Đánh Giá';
    }
  }
  public function miengiamgv($id){
    $dkk = DotKeKhai::find($id);
    $mg = $dkk->MienGiam->sortDesc();
    return $mg;
  }

}