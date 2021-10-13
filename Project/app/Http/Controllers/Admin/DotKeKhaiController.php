<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\DotKeKhaiServices;

class DotKeKhaiController extends Controller
{
    public function __construct(DotKeKhaiServices $DotKeKhaiServices){
        $this->DotKeKhaiServices = $DotKeKhaiServices;
    }

    public function create(){
       return view('pages.admin.dotkekhai.dotkekhai',[
           'title'=>'MỞ ĐỢT KÊ KHAI',
           'DanhSachDKK'=>$this->DotKeKhaiServices->list()
       ]);
    }

    public function store(Request $request){
        $this->DotKeKhaiServices->store($request);
        return redirect()->back();
    }

}
