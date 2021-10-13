<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DotKeKhai;


class DotKeKhaiServices {

  public function list(){
    return DotKeKhai::get();
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
    DotKeKhai::create([
      'ThoiGianBatDau'=>$dkk['tgbd'],
      'ThoiGianKetThuc'=>$dkk['tgkt']
    ]);
  }

}
