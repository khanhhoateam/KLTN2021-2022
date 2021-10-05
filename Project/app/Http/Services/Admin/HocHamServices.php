<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\HocHam;
use App\Models\Admin\HocHamTam;

class HocHamServices {

  public function store($request){
    HocHam::create([
      'TenHocHam' => $request->input('Ten-hoc-ham'),
      'DiemDMHH' => $request->input('Diem'),
      'MaDot' => $request->input('Ma-dot')
  ]);
  }

  public function list($madot){
    return HocHam::where('MaDot', $madot)->get();
  }

  public function temporary_save($request){
    HocHamTam::create([
      'TenHocHam' => $request->input('Ten-hoc-ham'),
      'DiemDMHH' => $request->input('Diem'),
      'MaDot' => $request->input('Ma-dot'),
      'Active' => $request->input('Active')
  ]);
  }

  public function temporary_save_list(){
    return HocHamTam::where('Active', 1)->get();
  }
  
}