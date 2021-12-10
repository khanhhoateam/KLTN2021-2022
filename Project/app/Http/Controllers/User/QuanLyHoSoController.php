<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\MienGiamServices;
use App\Http\Services\Admin\HocHamServices;
use App\Http\Services\User\QuanLyHoSoServices;
use App\Http\Services\Admin\DotKeKhaiServices;
use Session;
use Illuminate\Support\Facades\Auth;


class QuanLyHoSoController extends Controller
{
    public function __construct(QuanLyHoSoServices $QuanLyHoSoServices,MienGiamServices $MienGiamServices, DotKeKhaiServices $DotKeKhaiServices,HocHamServices $HocHamServices){
        $this->QuanLyHoSoServices = $QuanLyHoSoServices;
        $this->MienGiamServices = $MienGiamServices;
        $this->DotKeKhaiServices = $DotKeKhaiServices;
        $this->HocHamServices = $HocHamServices;
    }

    public function create(){
        $id = auth::id();
        $magv = $this->QuanLyHoSoServices->getMaGV($id);
        $hocham = $this->QuanLyHoSoServices->getHocHam($magv);
        $IDmiengiam = $this->QuanLyHoSoServices->getIDMienGiam($magv);

        if(!($this->QuanLyHoSoServices->getMienGiam($IDmiengiam))->isEmpty()) {
            $miengiam = $this->QuanLyHoSoServices->getMienGiam($IDmiengiam);
        }
        else{
            $miengiam = [1];
        }

        return view('pages.user.quanlyhoso.quanlyhoso',[
            'title'=>'QUẢN LÝ HỒ SƠ',
            'ThongTinDot'=>$this->DotKeKhaiServices->currentActive(),
            'MaGV'=>$magv,
            'GiangVien' => $this->QuanLyHoSoServices->list($id),
            'MienGiam'=> $miengiam,
            'HocHam' => $hocham,
            'TongKet' => $this->QuanLyHoSoServices->getDanhGia($magv),
        ]);
    }

    public function update($magv , Request $request){
		$magv = GiangVien::findOrFail($magv);
		$magv->update($request->all());
                return redirect('quan-ly-ho-so');
	}
}