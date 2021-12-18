@php
  use \App\Http\Services\User\DanhSachNCKHServices;
  use \App\Http\Services\User\GiangVienServices;
  use \App\Http\Services\Admin\XetDuyetNCKHServices;
  use \App\Http\Services\Admin\ChiTietNCKHServices;
@endphp 
@extends('mainUser')

@section('content')
<!-- /page content -->
<div class="right_col" role="main">
  <section class="content">
    <!-- Default box -->
    <table class="table table-striped jambo_table bulk_action">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên Hoạt Động</th>
          <th>Thành Phần Tham Gia</th>
          <th>Trạng thái</th>
          <th>Điểm Nghiên Cứu</th>
        </tr>
      </thead>
        @php
            $i=1;
            $count_hd = count($hoatdong);
        @endphp
      <tbody>
        @foreach ($hoatdong as $hd)
          <tr>
              <td>{{$i}}</td>
              <td>{{$hd['TenHD']}}</td>
              
              <td>
                @php
                  $thamgia = XetDuyetNCKHServices::listThamGia($hd['MaHoatDong']);
                  //Dem so giang vien tham gia trong hoat dong
                  $count_gvtg = count($thamgia);
                  for ($j=0; $j < $count_gvtg; $j++) { 
                     echo GiangVienServices::listByID($thamgia[$j]["MaGiangVien"]). " số điểm nhận: ". ChiTietNCKHServices::GetDiemNC($hd['MaHoatDong'], $thamgia[$j]["MaGiangVien"]). '<br>';
                  }
                @endphp
              </td>
              <td>{{$hd['TrangThai']}}</td>
              <td>{{$hd['Diem']}}</td>

          </tr>
          @php
            $i++;
          @endphp
        @endforeach
      <tbody>
        
      </table>
    <!-- /.card -->

  </section>
</div>
<!-- End page content -->
@endsection