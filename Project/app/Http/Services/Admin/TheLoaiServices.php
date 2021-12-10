<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TheLoai;
use App\Models\Admin\TheLoaiTam;

class TheLoaiServices {

  public function store($TheLoai){
    TheLoai::create([
      'TenTheLoai' => $TheLoai["TenTheLoai"],
      'DiemNC' => $TheLoai["DiemNC"],
      'MaDot' => $TheLoai["MaDot"]
  ]);
  }

  public function list($madot){
    return TheLoai::where('MaDot', $madot)->get();
  }

  public function temporary_table($request){
    TheLoaiTam::create([
      'TenTheLoai' => $request->input('Ten_the_loai'),
      'DiemNC' => $request->input('Diem'),
      'MaDot' => $request->input('Ma_dot'),
      'Active' => $request->input('Active')
  ]);
  }

  public function temporary_table_list(){
    return TheLoaiTam::where('Active', '1')->get();
  }

  public function del_temp_table($id){
    return TheLoaiTam::where('MaTheLoai', $id)->delete();
  }

  public function update_temp_table($id){
    return TheLoaiTam::where('MaTheLoai', $id)->update(['Active' => 0]);
  }

}
