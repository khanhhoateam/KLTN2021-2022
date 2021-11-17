<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\DotKeKhaiServices;
use App\Http\Requests\Admin\DotKeKhaiRequest;
use Session;


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

    public function store(DotKeKhaiRequest $request){
        $this->DotKeKhaiServices->store($request);
        Session::flash('success', 'Tạo mới Đợt kê khai thành công !');
        return redirect()->back();
    }
    public function close($id) {
        $this->DotKeKhaiServices->updateEnable($id);
        Session::flash('success', 'Đóng Đợt kê khai thành công !');
        return redirect()->back();
    }
}
