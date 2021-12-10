<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\HocHamServices;
use App\Http\Services\Admin\DotKeKhaiServices;
use App\Http\Requests\Admin\HocHamRequest;
use Session;

class HocHamController extends Controller
{
    public function __construct(HocHamServices $HocHamServices,DotKeKhaiServices $DotKeKhaiServices) {
        $this->HocHamServices = $HocHamServices;
        $this->DotKeKhaiServices = $DotKeKhaiServices;
    }

    public function create() {
        if(!($this->HocHamServices->temporary_table_list())->isEmpty()) {
            $datatam = $this->HocHamServices->temporary_table_list();
        }
        else{
            $datatam = [];
        }

        $madotmoi = $this->DotKeKhaiServices->currentActive()['MaDot'];
        $madoicu = $this->DotKeKhaiServices->getPreviousActive($madotmoi)['MaDot'];

        return view('pages.admin.hocham.hocham',[
            'title'=>'THIẾT LẬP ĐỊNH MỨC HỌC HÀM',
            'ThongTinDot'=>$this->DotKeKhaiServices->currentActive(),
            'TenHocHam'=> $this->HocHamServices->list($madoicu),
            'BangTam'=> $datatam,
            'DanhSachHocHam'=> $this->HocHamServices->list($madotmoi)
        ]);

    }


    public function temporary_table (HocHamRequest $request) {
        $this->HocHamServices->temporary_table($request);
        Session::flash('success', 'Đã thêm Học hàm vào bảng tạm lưu !');
        return redirect()->back();
    }

    public function del_temp_table ($id) {
        $this->HocHamServices->del_temp_table($id);
        return redirect()->back();
    }

    public function store() {
        $result = $this->HocHamServices->temporary_table_list();
        if(!($this->HocHamServices->temporary_table_list())->isEmpty()) {
            foreach($result as $result){
                $this->HocHamServices->store($result);
                $this->HocHamServices->update_temp_table($result["MaHocHam"]);
            }
            Session::flash('success', 'Thêm Học hàm thành công !');
        }
        return redirect()->back();
    }

}
