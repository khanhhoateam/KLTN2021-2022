<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\HocHam;
use App\Models\Admin\HocHamTam;
use Session;

class HocHamServices {

  public function store($hocham){
    $query = HocHam::where('TenHocHam', $hocham["TenHocHam"])->where('MaDot', $hocham["MaDot"])->update([
      'DiemDMHH' => $hocham["DiemDMHH"]
    ]);
    if(!($query > 0)){
      Session::flash('error', 'Sửa Học hàm không thành công !');
    }else{
      Session::flash('success', 'Sửa Học hàm thành công !');
    }
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
