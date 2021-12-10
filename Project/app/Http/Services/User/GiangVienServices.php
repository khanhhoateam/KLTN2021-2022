<?php

namespace App\Http\Services\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\GiangVien;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GiangVienServices {

  public function list(){
    return GiangVien::where('Active', '1')->get();
  }

  public static function listByID($id) {
    return GiangVien::Where("MaGiangVien", $id)->value("TenGiangVien");
  }

  public static function thongtingv($id) {
    return GiangVien::Where("MaGiangVien", $id)->get();
  }

  public static function getIDByName($name) {
    return GiangVien::Where("TenGiangVien", $name)->get();
  }
  
  public static function getHocHam($id){
    return GiangVien::find($id)->HocHam;
  }

  public function edit($request){
    User::where('id', Auth::id())->update([
      'name' => $request['TenGiangVien'],
      'email' => $request['Email']
    ]);
    GiangVien::where("MaGiangVien", $request['MaGiangVien'])->update([
      "TenGiangVien" => $request['TenGiangVien'],
      "SDT" => $request['SDT'],
      "Email" => $request['Email'],
    ]);
  }

}
