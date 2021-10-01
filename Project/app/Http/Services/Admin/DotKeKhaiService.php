<?php

namespace App\Http\Services\Admin;

use App\Models\DotKeKhai;

class DotKeKhaiService
{
  public function store($request)
  { 
      return DotKeKhai::create([
        'ThoiGianBatDau' => (string) $request->input('tgbd'),
        'ThoiGianKetThuc' => (string) $request->input('tgkt')
      ]);
  }
  public function getInformation()
  {
      return DotKeKhai::where('MaDot', 3)->get();
  }
}
