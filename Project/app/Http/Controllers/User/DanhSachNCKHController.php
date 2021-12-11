<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\User\KhaiBaoNCKHServices;
use App\Http\Services\User\DanhSachNCKHServices;
use App\Http\Services\User\ChiTietHDServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class DanhSachNCKHController extends Controller
{
    public function __construct(DanhSachNCKHServices $DanhSachNCKHServices){
        $this->DanhSachNCKHServices = $DanhSachNCKHServices;
    }

    public function list(){
        return view('pages.user.danhsachnckh.danhsachnckh',[
            'title'=>'DANH SÁCH HOẠT ĐỘNG NCKH',
            'hoatdong' => $this->DanhSachNCKHServices->listByID(Auth::user()->id),
        ]);
    }
    public function list_tg(){
        return view('pages.user.danhsachnckh.danhsachnckh',[
            'title'=>'DANH SÁCH HOẠT ĐỘNG NCKH THAM GIA',
            'hoatdong' => $this->DanhSachNCKHServices->listByName(Auth::user()->id),
        ]);
    }
}
