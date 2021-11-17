<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\HocHam;
use App\Models\Admin\HocHamTam;

class HocHamServices {

  public function store($hocham){
    HocHam::create([
      'TenHocHam' => $hocham["TenHocHam"],
      'DiemDMHH' => $hocham["DiemDMHH"],
      'MaDot' => $hocham["MaDot"]
  ]);
  }

  public function list($madot){
    return HocHam::where('MaDot', $madot)->orderByDesc('MaHocHam')->get();
  }

  public function temporary_table($request){
    HocHamTam::create([
      'TenHocHam' => $request->input('Ten_hoc_ham'),
      'DiemDMHH' => $request->input('Diem'),
      'MaDot' => $request->input('Ma_dot'),
      'Active' => $request->input('Active')
  ]);
  }

  public function temporary_table_list(){
    return HocHamTam::where('Active', '1')->get();
  }

  public function del_temp_table($id){
    return HocHamTam::where('MaHocHam', $id)->delete();
  }

  public function update_temp_table($id){
    return HocHamTam::where('MaHocHam', $id)->update(['Active' => 0]);
  }

}
