<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ChiTietMienGiam;
use App\Models\Admin\GiangVien;

class XetDuyetMGServices {
    public function list(){
        return ChiTietMienGiam::where('TrangThai', '0')->orderByDesc('IDMienGiam')->get();
      }

      public function getGiangVien($id){
        return GiangVien::where('MaGiangVien', $id)->value('TenGiangVien');
      }

      public function getMienGiam($id){
        return LoaiMienGiam::where('MaMienGiam', $id)->get();
      }

      public function approve($id ,$value){
        if($value == 0) {
            ChiTietMienGiam::where('IDMienGiam', $id)->update(['TrangThai' => '1']);  
        }
        else{
            ChiTietMienGiam::where('IDMienGiam', $id)->update(['TrangThai' => '2']);  
        }
      }
}
