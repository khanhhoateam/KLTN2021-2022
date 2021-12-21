<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\User\GiangVienServices;
use App\Http\Services\Admin\DotKeKhaiServices;
use App\Http\Services\User\KhaiBaoNCKHServices;
use App\Http\Services\User\HoSoServices;
use App\Http\Services\Admin\ChiTietMienGiamServices;
use Session;

class QuanLyGVController extends Controller
{
    public function __construct(GiangVienServices $GiangVienServices, DotKeKhaiServices $DotKeKhaiServices, KhaiBaoNCKHServices $KhaiBaoNCKHServices, HoSoServices $HoSoServices, ChiTietMienGiamServices $ChiTietMienGiamServices) {
        $this->GiangVienServices = $GiangVienServices;
        $this->DotKeKhaiServices = $DotKeKhaiServices;
        $this->KhaiBaoNCKHServices = $KhaiBaoNCKHServices;
        $this->HoSoServices = $HoSoServices;
        $this->ChiTietMienGiamServices = $ChiTietMienGiamServices;
    }

    public function list() {
        return view('pages.admin.quanlygiangvien.quanlygiangvien', [
            'title' => 'QUẢN LÝ GIẢNG VIÊN',
            'dkk' => $this->DotKeKhaiServices->list(), //dot ke khai
        ]);
    }

    public function listwithMaDot(Request $request){
        if(count($this->DotKeKhaiServices->ds_gv($request->input('dkk'))) != 0) {
            $thongke = $this->DotKeKhaiServices->thongkegv($request->input('dkk'));
        }else {
            $thongke = [];
        }
        return view('pages.admin.quanlygiangvien.quanlygiangvien', [
            'title' => 'QUẢN LÝ GIẢNG VIÊN',
            'gv' => $this->DotKeKhaiServices->ds_gv($request->input('dkk')), //danh sach giang vien trong dkk
            'dkk' => $this->DotKeKhaiServices->list(), //tat ca dot ke khai
            'dkkht' => $this->DotKeKhaiServices->listByID($request->input('dkk')), //dot ke khai hien tai
            'thongke' => $thongke
        ]);
    }
    public function chitiet($id){
        $dkk = $this->DotKeKhaiServices->currentActive();
        $ttgv = $this->GiangVienServices->thongtingv($id);
        $tk = $this->HoSoServices->getDanhGia($ttgv[0]['MaGiangVien']);
        return view('pages.admin.thongtingv.thongtingv', [
            'title' => 'THÔNG TIN GIẢNG VIÊN',
            'giangvien' => $ttgv,
            'miengiam' => $this->ChiTietMienGiamServices->getByIDgv($dkk['MaDot'], 
            $ttgv[0]['MaGiangVien']),
            'ThongTinDot'=>$this->DotKeKhaiServices->currentActive(),
            'TongKet' => $this->HoSoServices->getDanhGia($ttgv[0]['MaGiangVien']),
            'KetChuyen' => $this->HoSoServices->getKetChuyen($ttgv[0]['MaGiangVien'], $dkk['MaDot'])
        ]);
    }
    public function admin_edit(Request $request){
        $query = $this->GiangVienServices->admin_edit($request);
        if($query == true){
            Session::flash('success', 'Cập nhật hồ sơ thành công!');
        }else{
            Session::flash('error', 'Cập nhật hồ sơ thất bại!');
        }
        return redirect()->back();
    }
}
