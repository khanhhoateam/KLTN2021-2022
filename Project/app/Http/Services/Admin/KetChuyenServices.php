<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TheLoai;
use App\Models\Admin\HoatDong;
use App\Models\Admin\DotKeKhai;
use App\Models\Admin\HocHam;
use App\Models\Admin\MienGiam;
use App\Models\Admin\TongKet;
use App\Models\Admin\KetChuyen;
use App\Models\Admin\ChiTietMienGiam;
use App\Models\User\ChiTietHD;
use App\Models\User\GiangVien;
use Session;

class KetChuyenServices {

  public function ketchuyen($madot){
    //Cac hoat dong khai bao trong dot
    $theloaitrongdot = TheLoai::where('MaDot', $madot)->get();
    $hoatdongtrongdot = [];
    foreach($theloaitrongdot as $tl){
        $hoatdong = HoatDong::where('MaTheLoai', $tl['MaTheLoai'])->get();
        foreach($hoatdong as $hd){
            array_push($hoatdongtrongdot, $hd['MaHoatDong']);
        }
    }
    $cthd = ChiTietHD::whereIn('MaHoatDong', $hoatdongtrongdot)->get();
    //dd($hoatdongtrongdot);
    //dd($cthd);
    foreach($cthd as $cthd){
        $date = DotKeKhai::where('MaDot', $madot)->get()[0]['ThoiGianBatDau'];
        $year = date('Y', strtotime($date));
        $hsd = HoatDong::where('MaHoatDong', $cthd['MaHoatDong'])->value('HanSuDung') + $year - 1;
        //echo  $hsd .'</br>';
        if(count(KetChuyen::where('MaHoatDong', $cthd['MaHoatDong'])->where('IDGiangVien', $cthd['MaGiangVien'])->get()) == 0) {
            KetChuyen::create([
                "IDGiangVien" => $cthd['MaGiangVien'],
                "MaDot" => $madot,
                "MaHoatDong" => $cthd['MaHoatDong'],
                "DiemNC" => $cthd['GioNC'],
                "DiemDM" => 0,
                "DiemDu" => 0,
                "HSD" => $hsd
            ]);
        }
    }
    $ketchuyentrongdot = KetChuyen::where('MaDot', $madot)->get();
            
    $giangvientrongdot =  [];
    $giangvien =  KetChuyen::whereIn('MaHoatDong', $hoatdongtrongdot)->distinct('IDGiangVien')->get('IDGiangVien');
    foreach($giangvien as $gv){
        array_push($giangvientrongdot, $gv['IDGiangVien']);
    }
    //dd($giangvientrongdot);
    foreach($giangvientrongdot as $gvtd){
        $ketchuyen = KetChuyen::where('IDGiangVien', $gvtd)->where('HSD' , '>=', $year)->orderBy('HSD', 'asc')->orderBy('DiemNC', 'asc')->get();
        $diemdm = TongKet::where('MaGiangVien', $gvtd)->value('DiemDM');
        $diemdu = 0;
        foreach($ketchuyen as $kc){
            if($kc['DiemNC'] >= $diemdm){
                $diemdu = $kc['DiemNC'] - $diemdm;
                $diemdm = 0;
                KetChuyen::where('IDGiangVien', $kc['IDGiangVien'])->where('MaHoatDong', $kc['MaHoatDong'])->update([
                    "DiemDM" => $diemdm,
                    "DiemDu" => $diemdu
                ]);
            }else{
                $diemdm = $diemdm - $kc['DiemNC'];
                $diemdu = 0;
                KetChuyen::where('IDGiangVien', $kc['IDGiangVien'])->where('MaHoatDong', $kc['MaHoatDong'])->update([
                    "DiemDM" => $diemdm,
                    "DiemDu" => $diemdu
                ]);
            }
        }
    }
}

}
