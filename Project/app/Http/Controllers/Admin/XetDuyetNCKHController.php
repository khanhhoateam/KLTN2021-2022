<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\GiangVien;
use App\Models\User\KhaiBaoNCKH;
use App\Http\Services\Admin\XetDuyetNCKHServices;

class XetDuyetNCKHController extends Controller
{
    public function __construct(XetDuyetNCKHServices $XetDuyetNCKHServices){
        $this->XetDuyetNCKHServices =  $XetDuyetNCKHServices;
    }

    public function list(){
        return view('pages.admin.xetduyetnckh.xetduyetnckh', [
            'title' => 'XÉT DUYỆT NCKH',
            'hoatdong' =>$this->XetDuyetNCKHServices->list(),
        ]);
    }

    public function approve($id, $value){
        $this->XetDuyetNCKHServices->approve($id, $value);
        return redirect()->back();
    }
    
}
