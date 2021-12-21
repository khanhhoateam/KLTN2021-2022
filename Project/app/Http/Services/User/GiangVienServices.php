<?php

namespace App\Http\Services\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\GiangVien;
use App\Models\User;
use App\Models\Admin\HocHam;
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
    $hochamtrongdot = [];
    $hocham = HocHam::where('MaDot', 3)->get();
    foreach($hocham as $hh){
        array_push($hochamtrongdot, $hh['MaHocHam']);
    }
    return GiangVien::Where("TenGiangVien", $name)->whereIn("MaHocHam", $hochamtrongdot)->get();
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

  public function admin_edit($request){
    $tengv = GiangVien::where("MaGiangVien", $request['MaGiangVien'])->value('TenGiangVien');
    User::where('name', $tengv)->update([
      'name' => $request['TenGiangVien'],
      'email' => $request['Email']
    ]);
    GiangVien::where("MaGiangVien", $request['MaGiangVien'])->update([
      "TenGiangVien" => $request['TenGiangVien'],
      "SDT" => $request['SDT'],
      "Email" => $request['Email'],
    ]);
    return true;
  }

}
