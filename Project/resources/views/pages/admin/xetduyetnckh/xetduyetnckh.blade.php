@php
  use \App\Http\Services\Admin\XetDuyetNCKHServices;
  use \App\Http\Services\User\GiangVienServices;
@endphp 
@extends('main')

@section('content')
<!-- /page content -->
<div class="right_col" role="main">
  <section class="content">
    <!-- Default box -->
    <table class="table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên Hoạt Động</th>
          <th>Thành Phần Tham Gia</th>
          <th>Trạng thái</th>
          <th>Điểm Nghiên Cứu</th>
          <th>Hành Động</th>
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
                     echo GiangVienServices::listByID($thamgia[$j]["MaGiangVien"]). " ";
                  }
                @endphp
              </td>
              <td>{{$hd['TrangThai']}}</td>
              <td>{{$hd['Diem']}}</td>
              <td>
                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
                <a href="{{route('duyet-nckh', ['id' => $hd['MaHoatDong'], 'value' => '0'])}}" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Duyệt</a>
                <a href="{{route('duyet-nckh', ['id' => $hd['MaHoatDong'], 'value' => '1'])}}" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i> Không Duyệt</a>
              </td>
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