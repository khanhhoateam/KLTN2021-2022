<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\TheLoaiServices;
use App\Http\Services\Admin\DotKeKhaiServices;

class TheLoaiController extends Controller
{
    public function __construct(TheLoaiServices $TheLoaiServices, DotKeKhaiServices $DotKeKhaiServices) {
        $this->TheLoaiServices = $TheLoaiServices;
        $this->DotKeKhaiServices = $DotKeKhaiServices;
    }

    public function create() {
        if(!($this->TheLoaiServices->temporary_table_list())->isEmpty()) {
            $datatam = $this->TheLoaiServices->temporary_table_list();
        }
        else{
            $datatam = [];
        }

        $madotmoi = $this->DotKeKhaiServices->currentActive()['MaDot'];
        $madoicu = $this->DotKeKhaiServices->getPreviousActive($madotmoi)['MaDot'];

        return view('pages.admin.TheLoai.TheLoai',[
            'title'=>'THIẾT LẬP THỂ LOẠI',
            'ThongTinDot'=>$this->DotKeKhaiServices->currentActive(),
            'TheLoai'=> $this->TheLoaiServices->list($madoicu),
            'BangTam'=> $datatam,
            'DanhSachTheLoai'=> $this->TheLoaiServices->list($madotmoi)
        ]);

    }


    public function temporary_table (Request $request) {
        $this->TheLoaiServices->temporary_table($request);
        return redirect()->back();
    }

    public function del_temp_table ($id) {
        $this->TheLoaiServices->del_temp_table($id);
        return redirect()->back();
    }

    public function store() {
        $result = $this->TheLoaiServices->temporary_table_list();
        if(!($this->TheLoaiServices->temporary_table_list())->isEmpty()) {
            foreach($result as $result){
                $this->TheLoaiServices->store($result);
                $this->TheLoaiServices->update_temp_table($result["MaTheLoai"]);
            }
        }
        return redirect()->back();
    }

}
