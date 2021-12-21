@php
  use \App\Http\Services\Admin\XetDuyetNCKHServices;
  use \App\Http\Services\User\GiangVienServices;
  use \App\Http\Services\Admin\ChiTietNCKHServices;
  use \App\Http\Services\Admin\DotKeKhaiServices;
@endphp 
@extends('main')

@section('content')
<!-- /page content -->
<div class="right_col" role="main">
  <section class="content">
    <!-- Default box -->
    <form method="POST" action="{{route('danh-sach-nckh-dot')}}" class="form-horizontal form-label-left">
      @csrf
      <div class="col-md-5 col-sm-5">
          <select name="dkk" class="form-control" required="">
              @foreach ($dkk as $dkk)
              <option value="{{$dkk['MaDot']}}">Đợt từ {{ date('d-m-Y', strtotime($dkk['ThoiGianBatDau'])) }} đến {{ date('d-m-Y', strtotime($dkk['ThoiGianKetThuc'])) }}</option>
              @endforeach
          </select>
          <button type="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Chọn</button>
          <br>
        </div>
    </form>
    <table class="table table-striped jambo_table bulk_action">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên Hoạt Động</th>
          <th>Thành Phần Tham Gia</th>
          <th>Trạng thái</th>
          <th>Điểm Nghiên Cứu</th>
          <th>Đợt Kê Khai</th>
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
              <td>
                @if(!empty($dkkht))
                  Đợt từ {{ date('d-m-Y', strtotime($dkkht[0]['ThoiGianBatDau'])) }} đến {{ date('d-m-Y', strtotime($dkkht[0]['ThoiGianKetThuc'])) }}
                @elseif (empty($dkkht))
                  @php
                     $tgbd = DotKeKhaiServices::getDotWithMaHoatDong($hd['MaHoatDong'])[0]['ThoiGianBatDau'];
                      $tgkt = DotKeKhaiServices::getDotWithMaHoatDong($hd['MaHoatDong'])[0]['ThoiGianKetThuc'];
                  @endphp
                  Đợt từ {{ date('d-m-Y', strtotime( $tgbd )) }} đến {{ date('d-m-Y', strtotime( $tgkt )) }}
                @endif
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