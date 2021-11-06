<?php

namespace App\Http\Services\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\KhaiBaoNCKH;
use App\Models\User\ChiTietTam;
use App\Models\User\ChiTietHD;
use App\Models\User\GiangVien;

class KhaiBaoNCKHServices {
  public function store($request){
    if(count(ChiTietTam::where('Enable', 1)->get())>0){
      $giangvien = ChiTietTam::where('Enable', 1)->get();
    }
    if($request->filled('the-loai', 'ten-hd', 'file', 'trang-thai', 'hsd', 'mo-ta', 'tieu-de', 'nam-xb', 'nha-xb', 'tap-chi', 'so-phat-hanh', 'chuan-danh-muc')){
        KhaiBaoNCKH::create([
          'MaTheLoai' => $request['the-loai'],
          'TenHD' => $request['ten-hd'],
          'File' => $request['file'],
          'TrangThai' => $request['trang-thai'],
          'HanSuDung' => $request['hsd'],
          'MoTa' => $request['mo-ta'],
          //su dung session user
          'GVKeKhai' => $request['gv-ke-khai'],
          'TieuDe' => $request['tieu-de'],
          'NamXuatBan' => $request['nam-xb'],
          'NhaSuatBan' => $request['nha-xb'],
          'TapChi' => $request['tap-chi'],
          'SoPhatHanh' => $request['so-phat-hanh'],
          'ChuanDanhMuc' => $request['chuan-danh-muc'],
        ]);
        $hoatdongcuoi = KhaiBaoNCKH::select('MaHoatDong')->orderBy('MaHoatDong', 'DESC')->first();
        foreach($giangvien as $gv){
          ChiTietHD::create([
            'MaHoatDong' => $hoatdongcuoi['MaHoatDong'],
            'MaGiangVien' => $gv['MaGiangVien'],
            'GioNC' => 1,
            'MaVaiTro' => $gv['MaVaiTro']
          ]);
        }
    }
    else{
        KhaiBaoNCKH::create([
          'MaTheLoai' => $request['the-loai'],
          'TenHD' => $request['ten-hd'],
          'File' => $request['file'],
          'TrangThai' => $request['trang-thai'],
          'HanSuDung' => $request['hsd'],
          'MoTa' => 'abc',
          //su dung session user
          'GVKeKhai' => $request['gv-ke-khai'],
          'TieuDe' => '0',
          'NamXuatBan' => '0',
          'NhaSuatBan' => '0',
          'TapChi' => '0',
          'SoPhatHanh' => '0',
          'ChuanDanhMuc' => '0',
        ]);
        $hoatdongcuoi = KhaiBaoNCKH::select('MaHoatDong')->orderBy('MaHoatDong', 'DESC')->first();
        foreach($giangvien as $gv){
          ChiTietHD::create([
            'MaHoatDong' => $hoatdongcuoi['MaHoatDong'],
            'MaGiangVien' => $gv['MaGiangVien'],
            'GioNC' => 1,
            'MaVaiTro' => $gv['MaVaiTro']
          ]);
          ChiTietTam::where('MaGiangVien', $gv['MaGiangVien'])->update(['Enable' => 0]);
        } 
    }
    
  }

  public function temporary_table($request){
    //dd($request->input());
    $magiangvien = GiangVien::where('TenGiangVien', $request['ten-gv-tg'])
                    ->value('MaGiangVien');
    $tengiangvien = GiangVien::where('TenGiangVien', $request['ten-gv-tg'])
                    ->value('TenGiangVien');;
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

  public function searchByName($request)
    {
        // $keyword = $request->input('ten-gv-tg');
        // $giangvien = GiangVien::select('TenGiangVien')->where('TenGiangVien', 'LIKE', "%$keyword%")->get();
        // return response()->json($giangvien);
        $data = $request->all();

        $query = $data['query'];

        $filter_data = GiangVien::select('TenGiangVien')
                        ->where('TenGiangVien', 'LIKE', '%'.$query.'%')
                        ->get();
        return response()->json($filter_data);
    }
}
