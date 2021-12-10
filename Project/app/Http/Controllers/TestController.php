<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\TheLoai;
use App\Models\Admin\HoatDong;
use App\Models\Admin\HocHam;
use App\Models\Admin\MienGiam;
use App\Models\Admin\TongKet;
use App\Models\Admin\ChiTietMienGiam;
use App\Models\User\ChiTietHD;
use App\Models\User\GiangVien;

class TestController extends Controller
{
    public function test() {
        //Cac hoat dong khai bao trong dot
        $theloaitrongdot = TheLoai::where('MaDot', 3)->get();
        $hoatdongtrongdot = [];
        foreach($theloaitrongdot as $tl){
            $hoatdong = HoatDong::where('MaTheLoai', $tl['MaTheLoai'])->get();
            foreach($hoatdong as $hd){
                array_push($hoatdongtrongdot, $hd['MaHoatDong']);
            }
        }
        //Tinh gio NC cua tung giang vien trong dot
        $chitiethoatdong = ChiTietHD::whereIn('MaHoatDong', $hoatdongtrongdot)->get();
        $giangvientrongdot =  [];
        $giangvien =  ChiTietHD::whereIn('MaHoatDong', $hoatdongtrongdot)->distinct('MaGiangVien')->get('MaGiangVien');
        foreach($giangvien as $gv){
            array_push($giangvientrongdot, $gv['MaGiangVien']);
        }
        foreach($giangvientrongdot as $gv){
            $diem[$gv] = 0;
            foreach($hoatdongtrongdot as $hd) {
                $diem[$gv] +=  ChiTietHD::where('MaHoatDong', $hd)->where('MaGiangVien', $gv)->value('GioNC');
            }
        }
        foreach($giangvientrongdot as $gv) {
            echo 'Diem GV '.$gv.':'.$diem[$gv].' <br>';
        }
        //Cac hoc ham trong dot
        $hochamtrongdot = [];
        $hocham = HocHam::where('MaDot', 3)->get();
        foreach($hocham as $hh){
            array_push($hochamtrongdot, $hh['MaHocHam']);
        }
        //Cac mien giam trong dot
        $miengiamtrongdot = [];
        $miengiam = Miengiam::where('MaDot', 3)->get();
        foreach($miengiam as $mg){
            array_push($miengiamtrongdot, $mg['MaMienGiam']);
        }
        //Diem DM cua tung giang vien
        foreach($giangvientrongdot as $gv) {
            $hocham[$gv] = GiangVien::where('MaGiangVien', $gv)->whereIn('MaHocHam', $hochamtrongdot )->value('MaHocHam');
            $diemhh[$gv] = HocHam::where('MaHocHam', $hocham[$gv])->value('DiemDMHH');
            $diemmg[$gv] = 0;
            $tylemg[$gv] = 0;
            $mamg[$gv] = ChiTietMienGiam::where('MaGiangVien', $gv)->whereIn('MaMienGiam', $miengiamtrongdot)->where('TrangThai', 1)->get();
            foreach($mamg[$gv] as $mmg){
                if(
                    MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['DiemMienGiam'] != 0 
                    && MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['TyLeMienGiam'] == 0
                    ) {
                        if(MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['DiemMienGiam'] > $diemmg[$gv]){
                            $diemmg[$gv] = MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['DiemMienGiam'];
                        }
                    }
                elseif(
                    MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['DiemMienGiam'] == 0 
                    && MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['TyLeMienGiam'] != 0
                    ) {
                        if(MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['TyLeMienGiam'] > $tylemg[$gv])
                        $tylemg[$gv] = MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['TyLeMienGiam'];
                    }
            }
            if($tylemg[$gv] >0)
            {
                $diemdm[$gv] = $diemhh[$gv]-$diemhh[$gv]*$tylemg[$gv];
            } elseif($diemmg[$gv] > 0 && $tylemg[$gv] == 0 )
            {
                $diemdm[$gv] = $diemhh[$gv]-$diemmg[$gv];
            }
            $diemdg[$gv] = $diem[$gv]-$diemdm[$gv];
            if(TongKet::where('MaGiangVien', $gv)->where('MaDot', 3)->get()->isEmpty()){
                TongKet::create([
                    'MaGiangVien' => $gv,
                    'MaDot' => 3,
                    'DiemDM' => $diemdm[$gv],
                    'DiemDanhGia' => $diemdg[$gv],
                    'Enable' => 1
                ]);
                echo 'tao moi <br>';
            }elseif(!(TongKet::where('MaGiangVien', $gv)->where('MaDot', 3)->get())->isEmpty())
            {
                TongKet::where('MaGiangVien', $gv)->where('MaDot', 3)->update([
                    'DiemDM' => $diemdm[$gv],
                    'DiemDanhGia' => $diemdg[$gv]
                ]);
                echo 'cap nhat <br>';
            }
        }
        return view('test');
        
    }
}
