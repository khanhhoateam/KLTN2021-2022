<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\MienGiam;
use App\Models\Admin\MienGiamTam;

class MienGiamServices {

  public function store($MienGiam){
    MienGiam::create([
      'TenMienGiam' => $MienGiam['TenMienGiam'],
      'DiemMienGiam' => $MienGiam['DiemMienGiam'],
      'TyLeMienGiam' => $MienGiam['TyLeMienGiam'],
      'MaDot' => $MienGiam['MaDot'],
    ]);
  }

  public function list($madot){
    return MienGiam::where('MaDot', $madot)->orderByDesc('MaMienGiam')->get();
  }

  public function temporary_table($request){
    //dd($request->input());
    if($request->has('TyLe') && $request->input('TyLe') == 0 && empty($request->input('Diem'))) {
      MienGiamTam::create([
        'TenMienGiam' => $request->input('Ten_mien_giam'),
        'DiemMienGiam' => 0,
        'TyLeMienGiam' => 0,
        'MaDot' => $request->input('Ma_dot'),
        'Active' => $request->input('Active')
      ]);
    }
    elseif($request->has('Diem') && empty($request->input('TyLe'))) {
      MienGiamTam::create([
        'TenMienGiam' => $request->input('Ten_mien_giam'),
        'DiemMienGiam' => $request->input('Diem'),
        'TyLeMienGiam' => 0,
        'MaDot' => $request->input('Ma_dot'),
        'Active' => $request->input('Active')
      ]);
    }elseif($request->has('TyLe') && empty($request->input('Diem')) ) {
      MienGiamTam::create([
        'TenMienGiam' => $request->input('Ten_mien_giam'),
        'DiemMienGiam' => 0,
        'TyLeMienGiam' => $request->input('TyLe'),
        'MaDot' => $request->input('Ma_dot'),
        'Active' => $request->input('Active')
      ]);
    }
    //neu nhap ca 2 thi loi
  }

  public function temporary_table_list(){
    return MienGiamTam::where('Active', '1')->get();
  }

  public function del_temp_table($id){
    return MienGiamTam::where('MaMienGiam', $id)->delete();
  }

  public function update_temp_table($id){
    return MienGiamTam::where('MaMienGiam', $id)->update(['Active' => 0]);
  }

  public static function getMienGiamByID($id){
    return MienGiam::where('MaMienGiam', $id)->get();
  }

}
