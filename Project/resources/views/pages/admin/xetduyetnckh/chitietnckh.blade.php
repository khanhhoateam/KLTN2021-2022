@php
  use \App\Http\Services\Admin\XetDuyetNCKHServices;
  use \App\Http\Services\User\GiangVienServices;
  use App\Http\Services\Admin\ChiTietNCKHServices;
  use App\Http\Services\Admin\VaiTroServices;
@endphp 
@extends('main')

@section('content')
<!-- /page content -->
<div class="right_col" role="main" style="min-height: 1221px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{ $title }}</h3>
      </div>
      {{-- <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Nhập từ khóa...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Tìm!</button>
            </span>
          </div>
        </div>
      </div> --}}
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
            <div id="wizard" class="form_wizard wizard_horizontal" style="margin-top: 30px;">
              @include('layouts.alert')
              {{-- <form class="form-horizontal form-label-left">
                <div class="field item form-group">
                  <label class="col-form-label col-md-4 col-sm-4  label-align">Nhập Mã Hoạt Động Kê Khai<span class="required">*</span></label>
                  <div class="col-md-5 col-sm-5 input-group">
                    <input type="text" class="form-control" placeholder="Nhập ...">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="button">Tìm!</button>
                    </span>
                  </div>
                </div>
              </form> --}}
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bảng Chi Tiết Hoạt Động Được Kê Khai</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" action="{{ route('sua-nckh', $Ma_hd) }}" method="POST">
                      @csrf
                      <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Mã Hoạt Động </label>
                      <div class="col-md-5 col-sm-5 ">
                        <input type="text" class="form-control" placeholder="{{ $Ma_hd }}" readonly="" value="{{ $Ma_hd }}" name="mhd">
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Giảng Viên Kê Khai</label>
                      <div class="col-md-5 col-sm-5 ">
                        <input type="text" class="form-control" placeholder="{{ $Gv_kk }}" value= "{{ $Gv_kk }}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Trạng Thái</label>
                      <div class="col-md-5 col-sm-5 ">
                        <input type="text" class="form-control" placeholder="{{ $Trang_thai }}" value="{{ $Trang_thai }}" name="tt">
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Tên Hoạt động</label>
                      <div class="col-md-5 col-sm-5 ">
                        <input type="text" class="form-control" placeholder="{{ $Ten_hd }}" value="{{ $Ten_hd }}" name="thd">
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Thể Loại</label>
                      <div class="col-md-5 col-sm-5 ">
                        <input type="text" class="form-control" placeholder="{{ $The_loai }}" value="{{ $The_loai }}" name="theloai">
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Hạn Sử Dụng</label>
                      <div class="col-md-5 col-sm-5 ">
                        <input class="form-control" type="text" placeholder="{{ $Hsd }}" value="{{ $Hsd }}" name="hsd">
                      </div>
                    </div>
                    @php
                      $code = '<div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Tiêu đề</label>
                      <div class="col-md-5 col-sm-5 ">
                        <input class="form-control" type="text" name="date" placeholder="'. $TieuDe .'" name="tieude">
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Năm Xuất Bản</label>
                      <div class="col-md-5 col-sm-5 ">
                        <input class="form-control" type="text" name="date" placeholder="'. $NamXuatBan .'" name="namxb">
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Nhà Xuất Bản</label>
                      <div class="col-md-5 col-sm-5 ">
                        <input class="form-control" type="text" name="date" placeholder="'. $NhaXuatBan .'" name="nxb">
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Tên Tạo chí</label>
                      <div class="col-md-5 col-sm-5 ">
                        <input class="form-control" type="text" name="date" placeholder="'. $TapChi .'" name="tapchi">
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Số Phát Hành</label>
                      <div class="col-md-5 col-sm-5 ">
                        <input class="form-control" type="text" name="date" placeholder="'. $SoPhatHanh .'" name="sph">
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Chuẫn Danh Mục</label>
                      <div class="col-md-5 col-sm-5 ">
                        <input class="form-control" type="text" name="date" placeholder="'. $ChuanDanhMuc .'" name="cdm">
                      </div>
                    </div>';
                    @endphp
                    @if (empty($TieuDe) && empty($NamXuatBan) && empty($NhaXuatBan) && empty($TapChi) && empty($SoPhatHanh) && empty($ChuanDanhMuc))
                      
                    @else
                    {{!! $code !!}}
                    @endif
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Mô Tả</label>
                      <div class="col-md-5 col-sm-5 ">
                        <textarea class="resizable_textarea form-control" placeholder="{{ $MoTa }}" name="mt">{{ $MoTa }}</textarea>
                      </div>
                    </div>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Tên giảng viên</th>
                            <th>Vai trò</th>
                            <th>Điểm nhận</th>
                          </tr>
                        </thead>
                        @php
                            $i=1;
                        @endphp
                        <tbody>
                          @foreach ( $ChiTiet as $ct )
                          <tr>
                              <td>{{ $i }}</td>
                              <td>{{ GiangVienServices::listByID($ct['MaGiangVien']) }}</td>
                              <td>{{ VaiTroServices::getVaiTro($ct['MaVaiTro']) }}</td>
                              <td>{{ $ct['GioNC'] }}</td>
                              @php
                                $i++;
                              @endphp
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <hr>
                      <div class="form-group">
                        <div class="col-md-7 col-sm-7 label-align">
                          <button type="reset" class="btn btn-primary"><i class="fa fa-eraser"></i> Hủy</button>
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
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
  </div>
  <div class="clearfix"></div>
</div>
<!-- End page content -->
@endsection