<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\User\GiangVienServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Admin\ChiTietMienGiamServices;
use App\Http\Services\Admin\DotKeKhaiServices;
use App\Http\Services\User\HoSoServices;
use App\Http\Requests\User\HoSoRequest;
use Session;

class HoSoController extends Controller
{
    public function __construct(GiangVienServices $GiangVienServices, ChiTietMienGiamServices $ChiTietMienGiamServices, DotKeKhaiServices $DotKeKhaiServices, HoSoServices $HoSoServices ) {
        $this->GiangVienServices = $GiangVienServices;
        $this->ChiTietMienGiamServices = $ChiTietMienGiamServices;
        $this->DotKeKhaiServices = $DotKeKhaiServices;
        $this->HoSoServices = $HoSoServices;
    }

    public function profile(){
        $dkk = $this->DotKeKhaiServices->currentActive();
        $ttgv = $this->GiangVienServices->getIDByName(Auth::user()->name);
        $tk = $this->HoSoServices->getDanhGia($ttgv[0]['MaGiangVien']);
        return view('pages.user.thongtingv.thongtingv', [
            'title' => 'THÔNG TIN GIẢNG VIÊN',
            'giangvien' => $ttgv,
            'miengiam' => $this->ChiTietMienGiamServices->getByIDgv($dkk['MaDot'], 
            $ttgv[0]['MaGiangVien']),
            'ThongTinDot'=>$this->DotKeKhaiServices->currentActive(),
            'TongKet' => $this->HoSoServices->getDanhGia($ttgv[0]['MaGiangVien']),
            'KetChuyen' => $this->HoSoServices->getKetChuyen($ttgv[0]['MaGiangVien'], $dkk['MaDot'])
        ]);
    }
    public function edit(HoSoRequest $request){
        $this->GiangVienServices->edit($request);
        Session::flash('success', 'Sửa thông tin thành công!');
        return redirect()->back();
    }
}
