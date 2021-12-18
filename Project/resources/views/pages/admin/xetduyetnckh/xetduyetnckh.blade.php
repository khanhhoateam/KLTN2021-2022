@php
  use \App\Http\Services\Admin\XetDuyetNCKHServices;
  use \App\Http\Services\User\GiangVienServices;
  use \App\Http\Services\Admin\ChiTietNCKHServices;
@endphp 
@extends('main')

@section('content')
<!-- /page content -->
<div class="right_col" role="main" style="min-height: 688px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{$title}}</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
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
                  <th>Hành Động</th>
                </tr>
              </thead>
                @php
                    $i=1;
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
                        <a href="{{ route('chi-tiet-nckh', ['id' => $hd['MaHoatDong']]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
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
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
<!-- End page content -->
@endsection
