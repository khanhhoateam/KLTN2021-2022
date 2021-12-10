<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\XetDuyetMGServices;
use App\Http\Services\Admin\DotKeKhaiServices;

class XetDuyetMGController extends Controller
{
    public function __construct(XetDuyetMGServices $XetDuyetNCKHServices, DotKeKhaiServices $DotKeKhaiServices){
        $this->XetDuyetMGServices =  $XetDuyetNCKHServices;
        $this->DotKeKhaiServices =  $DotKeKhaiServices;
    }

    public function list(){
        return view('pages.admin.xetduyetmiengiam.xetduyetmiengiam', [
            'title' => 'XÉT DUYỆT MIỄN GIẢM',
            'miengiam' =>$this->XetDuyetMGServices->list(),
        ]);
    }
    public function approve($id, $value){
        $madot = $this->DotKeKhaiServices->currentActive();
        $this->XetDuyetMGServices->approve($id, $value);
        return redirect()->back();
    }
    
}
