<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\VaiTro;

class VaiTroServices {

  public function list(){
    return VaiTro::get();
  }

}
