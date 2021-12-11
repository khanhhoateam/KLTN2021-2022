<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\MienGiamServices;
use App\Http\Services\Admin\DotKeKhaiServices;
use App\Http\Requests\Admin\MienGiamRequest;
use Session;

class MienGiamController extends Controller
{
    public function __construct(MienGiamServices $MienGiamServices,DotKeKhaiServices $DotKeKhaiServices) {
        $this->MienGiamServices = $MienGiamServices;
        $this->DotKeKhaiServices = $DotKeKhaiServices;
    }

    public function create() {
        if(!($this->MienGiamServices->temporary_table_list())->isEmpty()) {
            $datatam = $this->MienGiamServices->temporary_table_list();
        }
        else{
            $datatam = [];
        }

        $madotmoi = $this->DotKeKhaiServices->currentActive()['MaDot'];
        $madoicu = $this->DotKeKhaiServices->getPreviousActive($madotmoi)['MaDot'];
        //dd($this->MienGiamServices->list($madoicu));
        return view('pages.admin.mienGiam.mienGiam',[
            'title'=>'THIẾT LẬP ĐỊNH MỨC MIỄN GIẢM',
            'ThongTinDot'=>$this->DotKeKhaiServices->currentActive(),
            'TenMienGiam'=> $this->MienGiamServices->list($madoicu),
            'BangTam'=> $datatam,
            'DanhSachMienGiam'=> $this->MienGiamServices->list($madotmoi)
        ]);

    }


    public function temporary_table (Request $request) {
        $this->MienGiamServices->temporary_table($request);
        Session::flash('success', 'Đã thêm Miễn giảm vào bảng tạm lưu !');
        return redirect()->back();
    }

    public function del_temp_table ($id) {
        $this->MienGiamServices->del_temp_table($id);
        return redirect()->back();
    }

    public function store() {
        $result = $this->MienGiamServices->temporary_table_list();
        if(!($this->MienGiamServices->temporary_table_list())->isEmpty()) {
            foreach($result as $result){
                $this->MienGiamServices->store($result);
                $this->MienGiamServices->update_temp_table($result["MaMienGiam"]);
            }
            Session::flash('success', 'Thêm Miễn giảm thành công !');
        }
        return redirect()->back();
    }

}
