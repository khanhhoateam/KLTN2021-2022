<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\User\GiangVienServices;

class HoSoController extends Controller
{
    public function profile(){
        return view('pages.user.thongtingv.thongtingv', [
            'title' => 'THÔNG TIN GIẢNG VIÊN',
        ]);
    }
}
