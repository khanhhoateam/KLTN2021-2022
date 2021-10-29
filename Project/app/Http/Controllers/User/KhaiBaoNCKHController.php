<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\User\KhaiBaoNCKHServices;
use App\Http\Services\User\GiangVienServices;
use App\Http\Services\Admin\TheLoaiServices;
use App\Http\Services\Admin\VaiTroServices;

class KhaiBaoNCKHController extends Controller
{
    public function __construct(KhaiBaoNCKHServices $KhaiBaoNCKHServices,GiangVienServices $GiangVienServices, TheLoaiServices $TheLoaiServices,VaiTroServices $VaiTroServices){
        $this->KhaiBaoNCKHServices = $KhaiBaoNCKHServices;
        $this->GiangVienServices = $GiangVienServices;
        $this->TheLoaiServices = $TheLoaiServices;
        $this->VaiTroServices = $VaiTroServices;
    }

    public function create(){
        return view('pages.user.khaibaonckh.khaibaonckh',[
            'title'=>'KHAI BÁO HOẠT ĐỘNG NCKH',
            'MaDot'=>2,
            'MaGV'=>1,
            'giangvientg'=> $this->KhaiBaoNCKHServices->list_temp_table(),
            'giangvien'=> $this->GiangVienServices->list(),
            'theloai' => $this->TheLoaiServices->list(1),
            'vaitro' => $this->VaiTroServices->list(),
        ]);
    }

    public function store(Request $request){    
        $this->KhaiBaoNCKHServices->store($request);
        return redirect()->back();
    }

    public function temp_table(Request $request){
        // dd($request->input());
        $this->KhaiBaoNCKHServices->temporary_table($request);
        return redirect()->back();
    }

    public function del_temp_table($id){
        $this->KhaiBaoNCKHServices->del_temporary_table($id);
        return redirect()->back();
    }

    //Auto Complete Search
    public function autocomplete(Request $request){
        $this->KhaiBaoNCKHServices->searchByName($request);
    }
}