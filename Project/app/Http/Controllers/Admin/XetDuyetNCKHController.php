<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\GiangVien;
use App\Models\User\KhaiBaoNCKH;
use App\Http\Services\Admin\XetDuyetNCKHServices;
use App\Http\Services\Admin\DotKeKhaiServices;

class XetDuyetNCKHController extends Controller
{
    public function __construct(XetDuyetNCKHServices $XetDuyetNCKHServices, DotKeKhaiServices $DotKeKhaiServices){
        $this->XetDuyetNCKHServices =  $XetDuyetNCKHServices;
        $this->DotKeKhaiServices =  $DotKeKhaiServices;
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
        ]);
    }

    public function approve($id, $value){
        $madot = $this->DotKeKhaiServices->currentActive();
        $this->XetDuyetNCKHServices->approve($id, $value);
        $this->XetDuyetNCKHServices->updateTongKet($madot);
        return redirect()->back();
    }
    
}
