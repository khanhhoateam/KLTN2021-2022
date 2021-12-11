<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\KhaiBaoNCKH;
use App\Models\Admin\TheLoai;
use App\Models\Admin\HoatDong;
use App\Models\Admin\HocHam;
use App\Models\Admin\MienGiam;
use App\Models\Admin\TongKet;
use App\Models\Admin\ChiTietMienGiam;
use App\Models\User\ChiTietHD;
use App\Models\User\GiangVien;

class XetDuyetNCKHServices {

  public function list(){
    return KhaiBaoNCKH::where('TrangThai', 'Chờ duyệt')->orderByDesc('MaHoatDong')->get();
  }
  public function listAll(){
    return KhaiBaoNCKH::orderByDesc('MaHoatDong')->get();
  }
  public static function listThamGia($id) {
    $thamgia = KhaiBaoNCKH::find($id)->ChiTietHD;
    return $thamgia;
  }
  public function approve($id ,$value){
    if($value == 0) {
      KhaiBaoNCKH::where('MaHoatDong', $id)->update(['TrangThai' => 'Đã duyệt']);  
    }
    else{
      KhaiBaoNCKH::where('MaHoatDong', $id)->update(['TrangThai' => 'Không duyệt']);  
    }
  }
  public function updateTongKet($madot) {
    //Cac hoat dong khai bao trong dot
    $theloaitrongdot = TheLoai::where('MaDot',  $madot['MaDot'])->get();
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
    //dd($giangvientrongdot);
    foreach($giangvientrongdot as $gv){
        $diem[$gv] = 0;
        foreach($hoatdongtrongdot as $hd) {
            $diem[$gv] +=  ChiTietHD::where('MaHoatDong', $hd)->where('MaGiangVien', $gv)->value('GioNc');
        }
    }
    foreach($giangvientrongdot as $gv) {
        echo 'Diem GV '.$gv.':'.$diem[$gv].' ';
    }
    //Cac hoc ham trong dot
    $hochamtrongdot = [];
    $hocham = HocHam::where('MaDot',  $madot['MaDot'])->get();
    foreach($hocham as $hh){
        array_push($hochamtrongdot, $hh['MaHocHam']);
    }
    //Cac mien giam trong dot
    $miengiamtrongdot = [];
    $miengiam = Miengiam::where('MaDot',  $madot['MaDot'])->get();
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
        //dd($gv, $diemhh[$gv], $tylemg[$gv], $diemmg[$gv]);
        if($tylemg[$gv] >0)
        {
            $diemdm[$gv] = $diemhh[$gv]-$diemhh[$gv]*$tylemg[$gv];
        } elseif($diemmg[$gv] > 0 && $tylemg[$gv] == 0 )
        {
            $diemdm[$gv] = $diemhh[$gv]-$diemmg[$gv];
        }
        $diemdg[$gv] = $diem[$gv]-$diemdm[$gv];
        if(TongKet::where('MaGiangVien', $gv)->where('MaDot',  $madot['MaDot'])->get()->isEmpty()){
            TongKet::create([
                'MaGiangVien' => $gv,
                'MaDot' => $madot['MaDot'],
                'DiemDM' => $diemdm[$gv],
                'DiemDanhGia' => $diemdg[$gv],
                'Enable' => 1
            ]);
            
        }elseif(!(TongKet::where('MaGiangVien', $gv)->where('MaDot',  $madot['MaDot'])->get())->isEmpty())
        {
            TongKet::where('MaGiangVien', $gv)->where('MaDot',  $madot['MaDot'])->update([
                'DiemDM' => $diemdm[$gv],
                'DiemDanhGia' => $diemdg[$gv]
            ]);
            
        }
    } 
  }
}
