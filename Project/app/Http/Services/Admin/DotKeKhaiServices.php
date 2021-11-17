<?php

namespace App\Http\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DotKeKhai;

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
      return DotKeKhai::where('MaDot', '<', $id)->orderBy('MaDot','asc')->first();
  }

  public function store($dkk){
    DotKeKhai::where('enable', 1)
    ->update(['enable' => 0]);
    DotKeKhai::create([
      'ThoiGianBatDau'=>$dkk['tgbd'],
      'ThoiGianKetThuc'=>$dkk['tgkt'],
      'Enable'=>$dkk['enable']
    ]);
  } 

  public function ds_gv($id){
    $dkk = DotKeKhai::find($id);
    $gv = $dkk->GiangVien->sortDesc();
    return $gv;
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
}
