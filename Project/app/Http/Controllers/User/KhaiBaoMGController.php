<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\MienGiamServices;
use App\Http\Services\Admin\DotKeKhaiServices;
use App\Http\Services\Admin\ChiTietMienGiamServices;
use App\Http\Requests\Admin\MienGiamRequest;
use App\Http\Services\User\GiangVienServices;
use Illuminate\Support\Facades\Auth;
use Session;

class KhaiBaoMGController extends Controller
{
    public function __construct(MienGiamServices $MienGiamServices,DotKeKhaiServices $DotKeKhaiServices, ChiTietMienGiamServices $ChiTietMienGiamServices) {
        $this->MienGiamServices = $MienGiamServices;
        $this->DotKeKhaiServices = $DotKeKhaiServices;
        $this->ChiTietMienGiamServices = $ChiTietMienGiamServices;
    }

    public function create() {
        $madotmoi = $this->DotKeKhaiServices->currentActive()['MaDot'];
        $madoicu = $this->DotKeKhaiServices->getPreviousActive($madotmoi)['MaDot'];
        $mg_trongdot = $this->DotKeKhaiServices->ds_mg($madotmoi);
        $ct_mg = $this->ChiTietMienGiamServices->list($mg_trongdot, GiangVienServices::getIDByName(Auth::user()->name)[0]["MaGiangVien"]);
        return view('pages.user.khaibaomg.khaibaomg', [
            'title' => 'KHAI BÁO MIỄN GIẢM',
            'ThongTinDot'=> $this->DotKeKhaiServices->currentActive(),
            'DanhSachMienGiam'=> $this->MienGiamServices->list($madotmoi),
            'ChiTietMienGiam'=> $ct_mg
        ]);
    }
    public function store(Request $request) {
        $query = $this->ChiTietMienGiamServices->store($request);
        if($query){
            Session::flash('success', 'Khai báo miễn giảm thành công!');
        }else{
            Session::flash('error', 'Khai báo miễn giảm thất bại!');
        }
        return redirect()->back();
    }
    public function delete($id) {
        $this->ChiTietMienGiamServices->delete($id);
        Session::flash('success', 'Xóa miễn giảm thành công!');
        return redirect()->back();
    }
}
