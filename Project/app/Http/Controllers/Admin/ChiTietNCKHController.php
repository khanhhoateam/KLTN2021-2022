<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\XetDuyetNCKHServices;
use App\Http\Services\Admin\ChiTietNCKHServices;
use App\Http\Services\User\GiangVienServices;
use App\Models\Admin\TheLoai;
use Session;

class ChiTietNCKHController extends Controller
{
    public function __construct(ChiTietNCKHServices $ChiTietNCKHServices, GiangVienServices $GiangVienServices){
        $this->ChiTietNCKHServices = $ChiTietNCKHServices;
        $this->GiangVienServices = $GiangVienServices;
    }
    public function show($id){
        $chitiet = $this->ChiTietNCKHServices->getNCKH_byID($id);
        foreach($chitiet as $ct){
            //dd($ct['TenHoatDong']);
            if($ct['TieuDe'] == 0 && $ct['NamXuatBan'] == 0 && $ct['NhaXuatBan'] == 0 && $ct['TapChi'] == 0 && $ct['SoPhatHanh'] == 0 && $ct['ChuanDanhMuc'] == 0 ){
                return view('pages.admin.xetduyetnckh.chitietnckh', [
                    "title" => "CHI TIẾT NCKH",
                    "Ma_hd" => $ct['MaHoatDong'],
                    "Gv_kk" => $this->GiangVienServices->listByID($ct['GVKeKhai']),
                    "MoTa" => $ct['MoTa'],
                    'Hsd' => $ct['HanSuDung'],
                    "Trang_thai" => $ct['TrangThai'],
                    "Ten_hd" => $ct['TenHD'],
                    "The_loai" => TheLoai::where('MaTheLoai', $ct['MaTheLoai'])->value('TenTheLoai'),
                    "TieuDe" => "",
                    "NamXuatBan" => "",
                    "NhaXuatBan" => "",
                    "TapChi" => "" ,
                    "SoPhatHanh" => "",
                    "ChuanDanhMuc" => "",
                    "Diem" => $ct['Diem'],
                    "ChiTiet" => $this->ChiTietNCKHServices->GetChiTietNCKH($ct['MaHoatDong'])
                ]);
            }else{
                return view('pages.admin.xetduyetnckh.chitietnckh', [
                    "title" => "CHI TIẾT NCKH",
                    "Ma_hd" => $ct['MaHoatDong'],
                    "Gv_kk" => $this->GiangVienServices->listByID($ct['GVKeKhai']),
                    "MoTa" => $ct['MoTa'],
                    'Hsd' => $ct['HanSuDung'],
                    "Trang_thai" => $ct['TrangThai'],
                    "Ten_hd" => $ct['TenHD'],
                    "The_loai" => $ct['MaTheLoai'],
                    "TieuDe" => $ct['TieuDe'],
                    "NamXuatBan" => $ct['NamXuatBan'],
                    "NhaXuatBan" => $ct['NhaXuatBan'],
                    "TapChi" => $ct['TapChi'],
                    "SoPhatHanh" => $ct['SoPhatHanh'],
                    "ChuanDanhMuc" => $ct['ChuanDanhMuc'],
                    "Diem" => $ct['Diem'],
                    "ChiTiet" => $this->ChiTietNCKHServices->GetChiTietNCKH($ct['MaHoatDong'])
                ]);
            }
            
        }
    }
    public function edit(Request $request) {
        $this->ChiTietNCKHServices->SuaNCKH($request);
        Session::flash('success', 'Sửa thông tin thành công!');
        return redirect()->back();
    }
}
