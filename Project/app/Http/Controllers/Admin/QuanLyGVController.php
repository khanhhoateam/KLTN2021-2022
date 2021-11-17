<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\User\GiangVienServices;
use App\Http\Services\Admin\DotKeKhaiServices;
use App\Http\Services\User\KhaiBaoNCKHServices;

class QuanLyGVController extends Controller
{
    public function __construct(GiangVienServices $GiangVienServices, DotKeKhaiServices $DotKeKhaiServices, KhaiBaoNCKHServices $KhaiBaoNCKHServices) {
        $this->GiangVienServices = $GiangVienServices;
        $this->DotKeKhaiServices = $DotKeKhaiServices;
        $this->KhaiBaoNCKHServices = $KhaiBaoNCKHServices;
    }

    public function list() {
        //dd($this->DotKeKhaiServices->thongkegv($request->input('dkk')));
        return view('pages.admin.quanlygiangvien.quanlygiangvien', [
            'title' => 'QUẢN LÝ GIẢNG VIÊN',
            'dkk' => $this->DotKeKhaiServices->list(), //dot ke khai
        ]);
    }

    public function listwithMaDot(Request $request){
        //dd($this->DotKeKhaiServices->thongkegv($request->input('dkk')));
        return view('pages.admin.quanlygiangvien.quanlygiangvien', [
            'title' => 'QUẢN LÝ GIẢNG VIÊN',
            'gv' => $this->DotKeKhaiServices->ds_gv($request->input('dkk')), //danh sach giang vien trong dkk
            'dkk' => $this->DotKeKhaiServices->list(), //tat ca dot ke khai
            'dkkht' => $this->DotKeKhaiServices->listByID($request->input('dkk')), //dot ke khai hien tai
            'thongke' => $this->DotKeKhaiServices->thongkegv($request->input('dkk'))
        ]);
    }

}
