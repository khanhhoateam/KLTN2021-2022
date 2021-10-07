<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DotKeKhai;


class DotKeKhaiServices {

  public function store($request){
    DotKeKhai::create([
      'ThoiGianBatDau' => $request->input('Ngay-bat-dau'),
      'ThoiGianKetThuc' => $request->input('Ngay-ket-thuc')
  ]);
  }

  public function list(){
    return $result = DotKeKhai::all();
  }

}