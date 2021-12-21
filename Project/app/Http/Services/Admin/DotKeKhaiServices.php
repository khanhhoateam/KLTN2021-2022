<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DotKeKhai;
use App\Models\Admin\HocHam;
use App\Models\Admin\MienGiam;
use App\Models\Admin\HoatDong;
use App\Models\Admin\TheLoai;
use App\Models\User\GiangVien;

class DotKeKhaiServices {

  public function list(){
    return DotKeKhai::orderBy('MaDot', 'desc')->get();
  }

  public function listByID($id){
    return DotKeKhai::where('MaDot', $id)->get();
  }

  //Lay ma dot hien tai
  public function currentActive(){
    return DotKeKhai::orderBy('MaDot', 'desc')->first();
  }

  //Lay ma dot cu
  public function getPreviousActive($id)
  {
      return DotKeKhai::where('MaDot', '<', $id)->orderBy('MaDot','desc')->first();
  }

  public function store($dkk){
    DotKeKhai::where('enable', 1)
    ->update(['enable' => 0]);
    DotKeKhai::create([
      'ThoiGianBatDau'=>$dkk['tgbd'],
      'ThoiGianKetThuc'=>$dkk['tgkt'],
      'Enable'=>$dkk['enable']
    ]);
    // tao moi hoc ham khi mo dkk moi
    $dkk_ht = $this->currentActive()['MaDot'] ;
    $dkk_t = $this->getPreviousActive($dkk_ht)['MaDot'];  
    $hocham = HocHam::where('MaDot', $dkk_t)->get();
    foreach($hocham as $hh){
        HocHam::create([
            'TenHocHam' => $hh['TenHocHam'],
            'DiemDMHH' => $hh['DiemDMHH'],
            'MaDot' => $dkk_ht,
        ]);
    };
    // lay ra cac ma hoc ham o dot truoc
    $hochamtrongdot = [];
    $hocham = HocHam::where('MaDot', $dkk_t)->get();
    foreach($hocham as $hh){
        array_push($hochamtrongdot, $hh['MaHocHam']);
    };
    // tao moi giang vien khi mo dkk moi
    $giangvien = GiangVien::whereIn('MaHocHam', $hochamtrongdot)->get();  
    foreach($giangvien as $gv){
        $tenhh = HocHam::where('MaHocHam', $gv['MaHocHam'])->where('MaDot', $dkk_t)->get();
        GiangVien::create([
            'TenGiangVien' => $gv['TenGiangVien'],
            'SDT' => $gv['SDT'],
            'Email' => $gv['Email'],
            'UserID' => $gv['UserID'],
            'MaHocHam' => HocHam::where('TenHocHam', $tenhh[0]['TenHocHam'])->where('MaDot', $dkk_ht)->value('MaHocHam'),
            'Active' => $gv['Active']
        ]);
    };
    // tao moi the loai khi mo dkk moi
    $theloai = TheLoai::where('MaDot', $dkk_t)->get();
    foreach($theloai as $tl){
        TheLoai::create([
            'TenTheLoai' => $tl['TenTheLoai'],
            'DiemNC' => $tl['DiemNC'],
            'MaDot' => $dkk_ht,
        ]);
    };
    //tao moi mien giam khi mo dkk moi
    $miengiam = MienGiam::where('MaDot', $dkk_t)->get();
    foreach($miengiam as $mg){
        MienGiam::create([
            'TenMienGiam' => $mg['TenMienGiam'],
            'DiemMienGiam' => $mg['DiemMienGiam'],
            'TyLeMienGiam' => $mg['TyLeMienGiam'],
            'MaDot' => $dkk_ht
        ]);
    };
  } 

  public function ds_gv($id){
    $dkk = DotKeKhai::find($id);
    $gv = $dkk->GiangVien->sortDesc();
    return $gv;
  }

  public function ds_mg($id){
    $dkk = DotKeKhai::find($id);
    $mg = $dkk->MienGiam->sortDesc();
    return $mg;
  }

  public function thongkegv($id){
    $gv = DotKeKhai::find($id)->GiangVien->sortDesc();
    $tong = count($gv);
    $xs = 0;
    $gioi = 0;
    $kha = 0;
    $dat = 0;
    $khongdat = 0;
    foreach($gv as $gv2) {
      $kq = TongKetServices::getDiemDanhGia($gv2['MaGiangVien']);
      if($kq < 0) {
        $khongdat++;
      } elseif ($kq <= 50 && $kq >=0) {
        $dat++;
      } elseif ($kq >50 && $kq <= 100 ) {
        $kha++;
      } elseif ($kq >100 && $kq <= 200 ) {
        $gioi++;
      } elseif ($kq >200 ) {
        $xs++;
      }
    }
    $TiLe_xs = round($xs/$tong, 2)*100;
    $TiLe_gioi = round($gioi/$tong, 2)*100;
    $TiLe_kha = round($kha/$tong, 2)*100;
    $TiLe_dat = round($dat/$tong, 2)*100;
    $TiLe_khongdat = 100 - $TiLe_xs - $TiLe_gioi - $TiLe_kha - $TiLe_dat;
    $thongkegv = collect(
      ['Tong' => $tong,
      'Xuat Sac' => $xs,
      'Gioi' => $gioi,
      'Kha' => $kha,
      'Dat' => $dat,
      'Khong Dat' => $khongdat,
      'Ty Le Xuat Sac' => $TiLe_xs,
      'Ty Le Gioi' => $TiLe_gioi,
      'Ty Le Kha' => $TiLe_kha,
      'Ty Le Dat' => $TiLe_dat,
      'Ty Le Khong Dat' => $TiLe_khongdat],
    );
    return $thongkegv;
  }

  public function updateEnable($id){
    return DotKeKhai::where('MaDot', $id)->update(['Enable' => '0']);
  }

  public static function getDotWithMaHoatDong($id){
    $theloai  = HoatDong::where('MaHoatDong', $id)->value('MaTheLoai');
    $madot = TheLoai::where('MaTheLoai',  $theloai)->value('MaDot');
    return DotKeKhai::where('MaDot', $madot)->get();
  }
}
