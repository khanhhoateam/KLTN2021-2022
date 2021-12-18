@php
  use \App\Http\Services\Admin\XetDuyetMienGiamServices;
  use \App\Http\Services\User\GiangVienServices;
  use \App\Http\Services\Admin\MienGiamServices;
  use \App\Http\Services\Admin\ChiTietMienGiamServices;
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
                  <th>Tên Giảng viên</th>
                  <th>Loại Miễn Giảm</th>
                  <th>Điểm Miễn Giảm</th>
                  <th>Tỷ Lệ Miễn Giảm</th>
                  <th>Trạng Thái</th>
                  <th>Hành Động</th>
                </tr>
              </thead>
                @php
                    $i=1;
                @endphp
              <tbody>
                @foreach ($miengiam as $mg)
                  <tr>
                      <td>{{$i}}</td>
                      <td>{{ GiangVienServices::thongtingv($mg['MaGiangVien'])[0]['TenGiangVien'] }}</td>
                      @php
                        $diemmg = MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['DiemMienGiam'];
                        $tylemg = MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['TyLeMienGiam'];
                      @endphp
                      @if($diemmg == 0 && $tylemg != 0)
                      <td>
                        {{
                            MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['TenMienGiam']
                      }}
                      </td>
                      <td>-</td>
                      <td>
                        {{
                            MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['TyLeMienGiam']*100 ."%";
                        }}
                      </td>
                      @elseif ($diemmg != 0 && $tylemg == 0)
                      <td>
                        {{
                            MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['TenMienGiam']
                      }}
                      </td>
                      <td>
                        {{
                          MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['DiemMienGiam'];
                        }}
                      </td>
                      <td>-</td>
                      @elseif ($diemmg == 0 && $tylemg == 0)
                      <td>
                        {{
                            MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['TenMienGiam']
                      }}
                      </td>
                      <td>
                        {{
                          MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['DiemMienGiam'];
                        }}
                      </td>
                      <td>-</td>
                      @endif
                      @if($mg['TrangThai'] == 0)
                      <td>Chờ Duyệt</td>
                      @endif
                      <td>
                        <a href="{{route('duyet-mien-giam', ['id' => $mg['IDMienGiam'], 'value' => '0'])}}" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Duyệt</a>
                        <a href="{{route('duyet-mien-giam', ['id' => $mg['IDMienGiam'], 'value' => '1'])}}" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i> Không Duyệt</a>
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
