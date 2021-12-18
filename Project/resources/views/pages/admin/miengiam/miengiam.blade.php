@extends('main')

@section('content')
<!-- /page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{$title}}</h3>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Nhập từ khóa...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Tìm!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2 class="text-danger">Đợt {{ date('Y', strtotime($ThongTinDot['ThoiGianBatDau'])) }} từ {{ date('d-m-Y', strtotime($ThongTinDot['ThoiGianBatDau'])) }} đến {{ date('d-m-Y', strtotime($ThongTinDot['ThoiGianKetThuc'])) }}</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="create" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thiết Lập Miễn Giảm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="list" data-toggle="tab" href="#profile-tab" role="tab" aria-controls="profile" aria-selected="false">Danh Sách Miễn Giảm</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="create">
                <!-- Content -->
                <div class="x_content">
                  @include('layouts.alert')
                  <div id="wizard" class="form_wizard wizard_horizontal" style="margin-top: 30px;">
                    <form method= "POST" action="{{route('bang-luu-tam-mg')}}" class="form-horizontal form-label-left">
                      @csrf
                      <input class="form-control" type="hidden" name="Ma_dot" value="{{$ThongTinDot['MaDot']}}">
                      <input class="form-control" type="hidden" name="Active" value="1">
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Chọn Miễn Giảm<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="Ten_mien_giam" required>
                            <option value="">Chọn ... </option>
                            @foreach($TenMienGiam as $miengiam)
                            <option value="{{$miengiam['TenMienGiam']}}">{{$miengiam['TenMienGiam']}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nhập điểm miễn giảm<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                          <input class="form-control" type="text" name="Diem" placeholder="Ví dụ: 73"></div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nhập tỷ lệ miễn giảm<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                          <input class="form-control" type="text" name="TyLe" placeholder="Ví dụ: 0.5"></div>
                      </div>
                      <div class="form-group" style="margin: 30px 0 30px 15%; ">
                        <div class="col-md-6 offset-md-3">
                            <button type='reset' class="btn btn-primary"><i class="fa fa-eraser"></i> Hủy</button>
                            <button type='submit' class="btn btn-success"><i class="fa fa-plus-square"></i> Thiết Lập Miễn Giảm Khác</button>
                        </div>
                      </div>
                      <!--Bảng tạm lưu-->
                      @if (count($BangTam) > 0)
                      <div class="col-md-12 col-sm-12 " style="font-size: medium; margin-top: 30px;">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>BẢNG TẠM LƯU <small>CÁC MIỄN GIẢM KHỞI TẠO</small></h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <table class="table table-striped projects">
                              <thead>
                                <tr>
                                  <th style="width: 1%">STT</th>
                                  <th>Tên Miễn Giảm</th>
                                  <th>Điểm Định Mức Miễn Giảm</th>
                                  <th>Tỷ Lệ Miễn Giảm</th>
                                  <th  style="width: 10%">Cài Đặt</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                  $i=1;
                                @endphp
                                @if(count($BangTam) > 0)
                                  @foreach ($BangTam as $tam)
                                    <tr>
                                      <td>{{$i}}</td>
                                      <td>{{$tam['TenMienGiam']}}</td>
                                      <td>{{$tam['DiemMienGiam']}}</td>
                                      <td>{{$tam['TyLeMienGiam']}}</td>
                                      <td>
                                        <a href="{{route('xoa-mg',['MienGiamTamID'=>$tam['MaMienGiam']])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xóa </a>
                                      </td>
                                    </tr>
                                    @php
                                      $i++;
                                    @endphp
                                  @endforeach
                                @endif
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td colspan="4"></td>
                                  <td>
                                  @if(count($BangTam) > 0)
                                    <a href="{{route('luu-mg')}}" class="btn btn-success btn-xs">
                                      <i class="fa fa-save"></i>Lưu</a>
                                  @endif
                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                      @endif
                    </form>
                  </div>
                </div>
              </div>
              <!-- Danh sách -->
              <div class="tab-pane fade" id="profile-tab" role="tabpanel" aria-labelledby="list">
                <div class="col-md-12 col-sm-12  ">
                  <div class="x_panel">
                    <div class="x_title">
                      {{-- <div class="col-md-2 col-sm-2">
                        <select id="heard" class="form-control" required>
                          <option value="">Chọn đợt kê khai</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
                      </div> --}}
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Tên Miễn Giảm</th>
                            <th>Điểm Miễn Giảm</th>
                            <th>Tỷ Lệ Miễn Giảm</th>
                            <th>Đợt</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                          $i=1;
                          @endphp
                          @if(count($DanhSachMienGiam)>0)
                            @foreach($DanhSachMienGiam as $dsmg)
                            <tr>
                              <td>{{$i}}</td>
                              <td>{{$dsmg['TenMienGiam']}}</td>
                              @if( $dsmg['TyLeMienGiam'] == 0 && $dsmg['DiemMienGiam'] != 0)
                                <td>{{$dsmg['DiemMienGiam']}}</td>
                                <td>-</td>
                              @endif
                              @if( $dsmg['DiemMienGiam'] == 0 && $dsmg['TyLeMienGiam'] != 0 )
                                <td>-</td>
                                <td>{{$dsmg['TyLeMienGiam']}}</td>
                              @endif
                              @if ($dsmg['TyLeMienGiam'] == 0 && $dsmg['DiemMienGiam'] == 0)
                                <td>-</td>
                                <td>{{$dsmg['TyLeMienGiam']}}</td>
                              @endif
                              <td>Từ {{ date('d-m-Y', strtotime($ThongTinDot['ThoiGianBatDau'])) }} đến {{ date('d-m-Y', strtotime($ThongTinDot['ThoiGianKetThuc'])) }}</td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
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
