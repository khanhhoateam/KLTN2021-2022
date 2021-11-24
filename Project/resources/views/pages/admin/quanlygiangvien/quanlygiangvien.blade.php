@php
  use \App\Http\Services\User\GiangVienServices;
  use \App\Http\Services\Admin\TongKetServices;
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
          <div class="x_content">
            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="create" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Danh Sách Giảng Viên</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="list" data-toggle="tab" href="#profile-tab" role="tab" aria-controls="profile" aria-selected="false">Giảng Viên Hoàn Thành</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade" id="profile-tab" role="tabpanel" aria-labelledby="list">
                <!-- Content -->
                @if(!(empty($dkkht)))
                  @if (empty($thongke))

                  @else
                  <div class="x_content">
                    <div id="wizard" class="form_wizard wizard_horizontal" style="margin-top: 30px;">
                      <!-- Char -->
                      <div class="col-md-5 col-sm-5 ">
                        <div class="x_panel tile fixed_height_320 overflow_hidden">
                          <div class="x_title">
                            <h2>Biểu Đồ Tỉ Lệ Giảng Viên Đạt Định Mức</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  {{-- Setting feature --}}
                                </div>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <table class="" style="width:100%">
                              <tbody><tr>
                                <th style="width:37%;">
                                  <p></p>
                                </th>
                                <th>
                                  <div class="col-lg-9 col-md-9 col-sm-9 ">
                                    <p class="">Xếp loại</p>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-3 ">
                                    <p class="">Tỉ lệ</p>
                                  </div>
                                </th>
                              </tr>
                              <tr>
                                <td><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                                  <canvas class="canvasDoughnut" height="175" width="175" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;"></canvas>
                                </td>
                                <td>
                                  <table class="tile_info">
                                    <tbody><tr>
                                      <td>
                                        <p><i class="fa fa-square blue"></i>Xuất Sắc</p>
                                      </td>
                                      <td>{{$thongke['Ty Le Xuat Sac']}}%</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <p><i class="fa fa-square green"></i>Giỏi</p>
                                      </td>
                                      <td>{{$thongke['Ty Le Gioi']}}%</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <p><i class="fa fa-square purple"></i>Khá </p>
                                      </td>
                                      <td>{{$thongke['Ty Le Kha']}}%</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <p><i class="fa fa-square aero"></i>Đạt </p>
                                      </td>
                                      <td>{{$thongke['Ty Le Dat']}}%</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <p><i class="fa fa-square red"></i>Không Đạt </p>
                                      </td>
                                      <td>{{$thongke['Ty Le Khong Dat']}}%</td>
                                    </tr>
                                  </tbody></table>
                                </td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>
                      </div>
                      <!-- End Char -->
                    </div>
                  </div>
                  @endif
                @endif
              </div>
              <!-- Danh sách -->
              <div class="tab-pane fade  show active" id="home" role="tabpanel" aria-labelledby="create">
                <div class="col-md-12 col-sm-12  ">
                  <br>
                  <form method="POST" action="{{route('quan-ly-gv')}}" class="form-horizontal form-label-left">
                    @csrf
                  <div class="col-md-5 col-sm-5">
                        <select name="dkk" class="form-control" required="">
                          @if (!empty($dkkht))
                            @foreach ($dkkht as $dkkht)
                            <option value="{{$dkkht['MaDot']}}">Đợt từ {{ date('d-m-Y', strtotime($dkkht['ThoiGianBatDau'])) }} đến {{ date('d-m-Y', strtotime($dkkht['ThoiGianKetThuc'])) }}</option>
                            @endforeach
                            @foreach ($dkk as $dkk)
                            <option value="{{$dkk['MaDot']}}">Đợt từ {{ date('d-m-Y', strtotime($dkk['ThoiGianBatDau'])) }} đến {{ date('d-m-Y', strtotime($dkk['ThoiGianKetThuc'])) }}</option>
                            @endforeach
                          @else
                            <option value="">Đợt kê khai</option>
                            @foreach ($dkk as $dkk)
                            <option value="{{$dkk['MaDot']}}">Đợt từ {{ date('d-m-Y', strtotime($dkk['ThoiGianBatDau'])) }} đến {{ date('d-m-Y', strtotime($dkk['ThoiGianKetThuc'])) }}</option>
                            @endforeach
                          @endif
                        </select>
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Chọn</button>
                        <br>
                      </div>
                  </form>
                  <form>
                    <div class="clearfix"></div>
                    <div class="x_content">
                      <div class="table-responsive">
                        <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xóa Đã Chọn</a><table class="table table-striped jambo_table bulk_action">
                          
                          <thead>
                            <tr class="headings">
                              <th>
                                <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                              </th>
                              <th class="column-title">STT</th>
                              <th class="column-title">Tên Giảng Viên</th>
                              <th class="column-title">Số Điện Thoại</th>
                              <th class="column-title">Emai</th>
                              <th class="column-title">Học Hàm</th>
                              <th class="column-title no-link last"><span class="nobr">Chức Năng</span>
                              </th>
                              <th class="bulk-actions" colspan="8">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              @if (!empty($gv))
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($gv as $gv)
                                  <tr>
                                    <td><input type="radio"></td>
                                    <td>{{$i}}</td>
                                    <td>{{$gv['TenGiangVien']}}</td>
                                    <td>{{$gv['SDT']}}</td>
                                    <td>{{$gv['Email']}}</td>
                                    <td>
                                      @php
                                        $hh = GiangVienServices::getHocHam($gv['MaGiangVien']);
                                        echo $hh[0]['TenHocHam'];
                                      @endphp
                                    </td>
                                  </tr>
                                  @php
                                    $i++;
                                  @endphp
                                @endforeach
                              @endif
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
<!-- End page content -->
@endsection
