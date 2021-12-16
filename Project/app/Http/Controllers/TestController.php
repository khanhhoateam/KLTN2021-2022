<?php

namespace App\Http\Controllers;

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

class TestController extends Controller
{
    // public function test() {
    //     //Cac hoat dong khai bao trong dot
    //     $theloaitrongdot = TheLoai::where('MaDot', 3)->get();
    //     $hoatdongtrongdot = [];
    //     foreach($theloaitrongdot as $tl){
    //         $hoatdong = HoatDong::where('MaTheLoai', $tl['MaTheLoai'])->get();
    //         foreach($hoatdong as $hd){
    //             array_push($hoatdongtrongdot, $hd['MaHoatDong']);
    //         }
    //     }
    //     //Tinh gio NC cua tung giang vien trong dot
    //     $chitiethoatdong = ChiTietHD::whereIn('MaHoatDong', $hoatdongtrongdot)->get();
    //     $giangvientrongdot =  [];
    //     $giangvien =  ChiTietHD::whereIn('MaHoatDong', $hoatdongtrongdot)->distinct('MaGiangVien')->get('MaGiangVien');
    //     foreach($giangvien as $gv){
    //         array_push($giangvientrongdot, $gv['MaGiangVien']);
    //     }
    //     foreach($giangvientrongdot as $gv){
    //         $diem[$gv] = 0;
    //         foreach($hoatdongtrongdot as $hd) {
    //             $diem[$gv] +=  ChiTietHD::where('MaHoatDong', $hd)->where('MaGiangVien', $gv)->value('GioNC');
    //         }
    //     }
    //     foreach($giangvientrongdot as $gv) {
    //         echo 'Diem GV '.$gv.':'.$diem[$gv].' <br>';
    //     }
    //     //Cac hoc ham trong dot
    //     $hochamtrongdot = [];
    //     $hocham = HocHam::where('MaDot', 3)->get();
    //     foreach($hocham as $hh){
    //         array_push($hochamtrongdot, $hh['MaHocHam']);
    //     }
    //     //Cac mien giam trong dot
    //     $miengiamtrongdot = [];
    //     $miengiam = Miengiam::where('MaDot', 3)->get();
    //     foreach($miengiam as $mg){
    //         array_push($miengiamtrongdot, $mg['MaMienGiam']);
    //     }
    //     //Diem DM cua tung giang vien
    //     foreach($giangvientrongdot as $gv) {
    //         $hocham[$gv] = GiangVien::where('MaGiangVien', $gv)->whereIn('MaHocHam', $hochamtrongdot )->value('MaHocHam');
    //         $diemhh[$gv] = HocHam::where('MaHocHam', $hocham[$gv])->value('DiemDMHH');
    //         $diemmg[$gv] = 0;
    //         $tylemg[$gv] = 0;
    //         $mamg[$gv] = ChiTietMienGiam::where('MaGiangVien', $gv)->whereIn('MaMienGiam', $miengiamtrongdot)->where('TrangThai', 1)->get();
    //         foreach($mamg[$gv] as $mmg){
    //             if(
    //                 MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['DiemMienGiam'] != 0 
    //                 && MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['TyLeMienGiam'] == 0
    //                 ) {
    //                     if(MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['DiemMienGiam'] > $diemmg[$gv]){
    //                         $diemmg[$gv] = MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['DiemMienGiam'];
    //                     }
    //                 }
    //             elseif(
    //                 MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['DiemMienGiam'] == 0 
    //                 && MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['TyLeMienGiam'] != 0
    //                 ) {
    //                     if(MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['TyLeMienGiam'] > $tylemg[$gv])
    //                     $tylemg[$gv] = MienGiam::where('MaMienGiam', $mmg['MaMienGiam'])->get()[0]['TyLeMienGiam'];
    //                 }
    //         }
    //         if($tylemg[$gv] >0)
    //         {
    //             $diemdm[$gv] = $diemhh[$gv]-$diemhh[$gv]*$tylemg[$gv];
    //         } elseif($diemmg[$gv] > 0 && $tylemg[$gv] == 0 )
    //         {
    //             $diemdm[$gv] = $diemhh[$gv]-$diemmg[$gv];
    //         }
    //         $diemdg[$gv] = $diem[$gv]-$diemdm[$gv];
    //         if(TongKet::where('MaGiangVien', $gv)->where('MaDot', 3)->get()->isEmpty()){
    //             TongKet::create([
    //                 'MaGiangVien' => $gv,
    //                 'MaDot' => 3,
    //                 'DiemDM' => $diemdm[$gv],
    //                 'DiemDanhGia' => $diemdg[$gv],
    //                 'Enable' => 1
    //             ]);
    //             echo 'tao moi <br>';
    //         }elseif(!(TongKet::where('MaGiangVien', $gv)->where('MaDot', 3)->get())->isEmpty())
    //         {
    //             TongKet::where('MaGiangVien', $gv)->where('MaDot', 3)->update([
    //                 'DiemDM' => $diemdm[$gv],
    //                 'DiemDanhGia' => $diemdg[$gv]
    //             ]);
    //             echo 'cap nhat <br>';
    //         }
    //     }
    //     return view('test');
        
    // }
    // public function dkk(){
    //     // tao moi hoc ham khi mo dkk moi
    //     $hocham = HocHam::where('MaDot', 2)->get();
    //     foreach($hocham as $hh){
    //         HocHam::create([
    //             'TenHocHam' => $hh['TenHocHam'],
    //             'DiemDMHH' => $hh['DiemDMHH'],
    //             'MaDot' => 3,
    //         ]);
    //     };
    //     // lay ra cac ma hoc ham o dot truoc
    //     $hochamtrongdot = [];
    //     $hocham = HocHam::where('MaDot', 2)->get();
    //     foreach($hocham as $hh){
    //         array_push($hochamtrongdot, $hh['MaHocHam']);
    //     };
    //     // tao moi giang vien khi mo dkk moi
    //     $giangvien = GiangVien::whereIn('MaHocHam', $hochamtrongdot)->get();
    //     foreach($giangvien as $gv){
    //         $tenhh = HocHam::where('MaHocHam', $gv['MaHocHam'])->where('MaDot', 2)->get();
    //         GiangVien::create([
    //             'TenGiangVien' => $gv['TenGiangVien'],
    //             'SDT' => $gv['SDT'],
    //             'Email' => $gv['Email'],
    //             'UserID' => $gv['UserID'],
    //             'MaHocHam' => HocHam::where('TenHocHam', $tenhh[0]['TenHocHam'])->where('MaDot', 3)->value('MaHocHam'),
    //             'Active' => $gv['Active']
    //         ]);
    //     };
    //     // tao moi the loai khi mo dkk moi
    //     $theloai = TheLoai::where('MaDot', 2)->get();
    //     foreach($theloai as $tl){
    //         TheLoai::create([
    //             'TenTheLoai' => $tl['TenTheLoai'],
    //             'DiemNC' => $tl['DiemNC'],
    //             'MaDot' => 3,
    //         ]);
    //     };
    //     //tao moi mien giam khi mo dkk moi
    //     $miengiam = MienGiam::where('MaDot', 2)->get();
    //     foreach($miengiam as $mg){
    //         MienGiam::create([
    //             'TenMienGiam' => $mg['TenMienGiam'],
    //             'DiemMienGiam' => $mg['DiemMienGiam'],
    //             'TyLeMienGiam' => $mg['TyLeMienGiam'],
    //             'MaDot' => 3
    //         ]);
    //     };
    // }
    public function ketchuyen(){
        //Cac hoat dong khai bao trong dot
        $theloaitrongdot = TheLoai::where('MaDot', 3)->get();
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
            $date = DotKeKhai::where('MaDot', 3)->get()[0]['ThoiGianBatDau'];
            $year = date('Y', strtotime($date));
            $hsd = HoatDong::where('MaHoatDong', $cthd['MaHoatDong'])->value('HanSuDung') + $year - 1;
            //echo  $hsd .'</br>';
            if(count(KetChuyen::where('MaHoatDong', $cthd['MaHoatDong'])->where('IDGiangVien', $cthd['MaGiangVien'])->get()) == 0) {
                KetChuyen::create([
                    "IDGiangVien" => $cthd['MaGiangVien'],
                    "MaDot" => 3,
                    "MaHoatDong" => $cthd['MaHoatDong'],
                    "DiemNC" => $cthd['GioNC'],
                    "DiemDM" => 0,
                    "DiemDu" => 0,
                    "HSD" => $hsd
                ]);
            }
        }
        $ketchuyentrongdot = KetChuyen::where('MaDot', 3)->get();
                
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
