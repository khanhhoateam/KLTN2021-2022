<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DotKeKhai;


class DotKeKhaiServices {

  public function list(){
    return DotKeKhai::orderBy('MaDot', 'desc')->get();
  }

  public function listByID($id){
    return DotKeKhai::where('MaDot', $id)->get();
  }

  //Lay ma dot hien tai
  public function currentActive(){
    return DotKeKhai::orderBy('MaDot', 'desc')->first();
  }

  //Lay ma dot cu
  public function getPreviousActive($id)
  {
      return DotKeKhai::where('MaDot', '<', $id)->orderBy('MaDot','asc')->first();
  }

  public function store($dkk){
    DotKeKhai::where('enable', 1)
    ->update(['enable' => 0]);
    DotKeKhai::create([
      'ThoiGianBatDau'=>$dkk['tgbd'],
      'ThoiGianKetThuc'=>$dkk['tgkt'],
      'Enable'=>$dkk['enable']
    ]);
  } 

  public function ds_gv($id){
    $dkk = DotKeKhai::find($id);
    $gv = $dkk->GiangVien->sortDesc();
    return $gv;
  }
}
