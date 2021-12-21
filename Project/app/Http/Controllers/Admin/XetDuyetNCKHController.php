<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\GiangVien;
use App\Models\User\KhaiBaoNCKH;
use App\Models\User\ChiTietHD;
use App\Http\Services\Admin\XetDuyetNCKHServices;
use App\Http\Services\Admin\DotKeKhaiServices;
use App\Http\Services\Admin\KetChuyenServices;

class XetDuyetNCKHController extends Controller
{
    public function __construct(XetDuyetNCKHServices $XetDuyetNCKHServices, DotKeKhaiServices $DotKeKhaiServices, KetChuyenServices $KetChuyenServices){
        $this->XetDuyetNCKHServices =  $XetDuyetNCKHServices;
        $this->DotKeKhaiServices =  $DotKeKhaiServices;
        $this->KetChuyenServices =  $KetChuyenServices;
    }

    public function list(){
        return view('pages.admin.xetduyetnckh.xetduyetnckh', [
            'title' => 'XÉT DUYỆT NCKH',
            'hoatdong' =>$this->XetDuyetNCKHServices->list(),
        ]);
    }

    public function listAll(){
        return view('pages.admin.danhsachnckh.danhsachnckh', [
            'title' => 'DANH SÁCH NCKH',
            'hoatdong' =>$this->XetDuyetNCKHServices->listAll(),
            'dkk' => $this->DotKeKhaiServices->list(),
        ]);
    }

    public function listwithMaDot(Request $request){
        return view('pages.admin.danhsachnckh.danhsachnckh', [
            'title' => 'DANH SÁCH NCKH',
            'hoatdong' =>$this->XetDuyetNCKHServices->listwithMaDot($request->input('dkk')),
            'dkk' => $this->DotKeKhaiServices->list(),
            'dkkht' => $this->DotKeKhaiServices->listByID($request->input('dkk')),
        ]);
    }

    public function approve($id, $value){
        $madot = $this->DotKeKhaiServices->currentActive();
        $this->XetDuyetNCKHServices->approve($id, $value);
        if($this->XetDuyetNCKHServices->approve($id, $value) == 1){
            $this->XetDuyetNCKHServices->updateTongKet($madot);
            $this->KetChuyenServices->ketchuyen($madot);
        }
        else{
            ChiTietHD::where('MaHoatDong', $id)->delete();
        }
        return redirect()->back();
    }
    
}
