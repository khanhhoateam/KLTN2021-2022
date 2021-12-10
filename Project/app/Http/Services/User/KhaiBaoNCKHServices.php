<?php

namespace App\Http\Services\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\KhaiBaoNCKH;
use App\Models\User\ChiTietTam;
use App\Models\User\ChiTietHD;
use App\Models\User\GiangVien;
use App\Models\Admin\TheLoai;
use App\Models\Admin\VaiTro;
use App\Models\User;
use Illuminate\Support\Arr;

class KhaiBaoNCKHServices {
  public function store($request){
    if(count(ChiTietTam::where('Enable', 1)->get())>0){
      $giangvien = ChiTietTam::where('Enable', 1)->get();
    }
    if($request->filled('the-loai', 'ten-hd', 'file', 'trang-thai', 'hsd', 'mo-ta', 'tieu-de', 'nam-xb', 'nha-xb', 'tap-chi', 'so-phat-hanh', 'chuan-danh-muc')){
        $gv = GiangVien::where(
                              'TenGiangVien', 
                              User::where('id', $request['gv-ke-khai'])->value('name')
                              )->value('MaGiangVien');
        KhaiBaoNCKH::create([
          'MaTheLoai' => $request['the-loai'],
          'TenHD' => $request['ten-hd'],
          'File' => $request['file'],
          'TrangThai' => $request['trang-thai'],
          'HanSuDung' => $request['hsd'],
          'MoTa' => $request['mo-ta'],
          'GVKeKhai' => $gv,
          'TieuDe' => $request['tieu-de'],
          'NamXuatBan' => $request['nam-xb'],
          'NhaXuatBan' => $request['nha-xb'],
          'TapChi' => $request['tap-chi'],
          'SoPhatHanh' => $request['so-phat-hanh'],
          'ChuanDanhMuc' => $request['chuan-danh-muc'],
          'Diem' => TheLoai::where("MaTheLoai", $request['the-loai'])->value('DiemNC')
        ]);
        // Tinh diem NC cua cac thanh phan tham gia o day
        $hoatdongcuoi = KhaiBaoNCKH::select('MaHoatDong')->orderBy('MaHoatDong', 'DESC')->first();
        foreach($giangvien as $giangvien){
          ChiTietHD::create([
            'MaHoatDong' => $hoatdongcuoi['MaHoatDong'],
            'MaGiangVien' => $giangvien['MaGiangVien'],
            'GioNC' => 0,
            'MaVaiTro' => $giangvien['MaVaiTro']
          ]);
          ChiTietTam::where('MaGiangVien', $giangvien['MaGiangVien'])->update(['Enable' => 0]);
        }
        $cthd = ChiTietHD::where('MaHoatDong', $hoatdongcuoi['MaHoatDong'])->get();
        foreach($cthd as $cthd) {
          $gio_nc = $this->TinhDiemNC($hoatdongcuoi['MaHoatDong'], $request['the-loai'], $cthd['MaVaiTro']);
          ChiTietHD::where('IDHoatDong', $cthd['IDHoatDong'])->update(['GioNC' => $gio_nc]);
        }
    }
    else{
        $gv = GiangVien::where(
                              'TenGiangVien', 
                              User::where('id', $request['gv-ke-khai'])->value('name')
                              )->value('MaGiangVien');
        KhaiBaoNCKH::create([
          'MaTheLoai' => $request['the-loai'],
          'TenHD' => $request['ten-hd'],
          'File' => $request['file'],
          'TrangThai' => $request['trang-thai'],
          'HanSuDung' => $request['hsd'],
          'MoTa' => $request['mo-ta'],
          'GVKeKhai' => $gv,
          'TieuDe' => '0',
          'NamXuatBan' => '0',
          'NhaXuatBan' => '0',
          'TapChi' => '0',
          'SoPhatHanh' => '0',
          'ChuanDanhMuc' => '0',
          'Diem' => TheLoai::where("MaTheLoai", $request['the-loai'])->value('DiemNC')
        ]);
        $hoatdongcuoi = KhaiBaoNCKH::select('MaHoatDong')->orderBy('MaHoatDong', 'DESC')->first();
        foreach($giangvien as $giangvien){
          ChiTietHD::create([
            'MaHoatDong' => $hoatdongcuoi['MaHoatDong'],
            'MaGiangVien' => $giangvien['MaGiangVien'],
            'GioNC' => 0,
            'MaVaiTro' => $giangvien['MaVaiTro']
          ]);
          ChiTietTam::where('MaGiangVien', $giangvien['MaGiangVien'])->update(['Enable' => 0]);
        } 
        $cthd = ChiTietHD::where('MaHoatDong', $hoatdongcuoi['MaHoatDong'])->get();
        foreach($cthd as $cthd) {
          $gio_nc = $this->TinhDiemNC($hoatdongcuoi['MaHoatDong'], $request['the-loai'], $cthd['MaVaiTro']);
          ChiTietHD::where('IDHoatDong', $cthd['IDHoatDong'])->update(['GioNC' => $gio_nc]);
        }
    }
    
  }
  
  public function temporary_table($request){
    $magiangvien = GiangVien::where('TenGiangVien', $request['ten-gv-tg'])
                    ->value('MaGiangVien');
    $tengiangvien = GiangVien::where('TenGiangVien', $request['ten-gv-tg'])
                    ->value('TenGiangVien');
    ChiTietTam::create([
      'MaGiangVien' => $magiangvien,
      'TenGiangVien' => $tengiangvien,
      'MaVaiTro' => $request->input('vai-tro'),
      'Enable' => 1
    ]);
  }

  public function list_temp_table(){
    return ChiTietTam::where('Enable', 1)->get();
  }

  public function del_temporary_table($id){
    return ChiTietTam::where('id', $id)->update(['Enable' => 0]);
  }

  public function listTrangThai(){
    return KhaiBaoNCKH::distinct()->get('TrangThai');
  }

  public function TinhDiemNC($mahd, $matheloai, $mavaitro){
    if(count(ChiTietHD::where('MaHoatDong', $mahd)->get()) == 1) {
      $diem = TheLoai::where("MaTheLoai", $matheloai)->value('DiemNC');
    }else {
      $sl_tg = count(ChiTietHD::where('MaHoatDong', $mahd)
                            ->where('MaVaiTro', $mavaitro)->get());
      $diem = (TheLoai::where("MaTheLoai", $matheloai)->value('DiemNC')*VaiTro::where("MaVaiTro", $mavaitro)->value('TiLe'))/$sl_tg;
    }
    return (int) $diem;
  }
  
}
