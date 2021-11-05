<?php

namespace App\Http\Services\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\GiangVien;

class GiangVienServices {
  public function list(){
    return GiangVien::get();
  }
  public static function listByID($id) {
    return GiangVien::Where("MaGiangVien",$id)->value("TenGiangVien");
  }
}
