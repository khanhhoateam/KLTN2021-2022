<?php

namespace App\Http\Services\Admin;

use App\Models\HocHam;

class HocHamService
{
  public function store($request)
  { 
      return HocHam::create([
        'TenHocHam' => (string) $request->input('TenHocHam'),
        'DiemDMHH' => (int) $request->input('diem'),
        'MaDot' => (int) $request->input('dot')
      ]);
  }
  public function getInformation()
  {
      return HocHam::where('MaDot', 1)->get();
  }
  public function delete($request)
  {
      return HocHam::where('MaHocHam', $request->input('MaHocHam'))->delete();
  }
}
