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
          {{-- <div class="input-group">
            <input type="text" class="form-control" placeholder="Nhập từ khóa...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Tìm!</button>
            </span>
          </div> --}}
        </div>
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
                <a class="nav-link active" id="create" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tạo Đợt Kê Khai</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="list" data-toggle="tab" href="#profile-tab" role="tab" aria-controls="profile" aria-selected="false">Danh Sách Đợt Kê Khai</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="create">
                <!-- Content -->
                <div class="x_content">
                  @include('layouts.alert')
                  <div id="wizard" class="form_wizard wizard_horizontal" style="margin-top: 30px;">
                    <form method="POST" action="" class="form-horizontal form-label-left">
                      @csrf
                      <input class="form-control" type="hidden" value="1" name="enable">
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Ngày Bắt Đầu<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                          <input class="form-control" class='date' type="date" name="tgbd" required='required'>
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Ngày Kết Thúc<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='date' type="date" name="tgkt" required='required'></div>
                      </div>
                      <div class="form-group" style="margin: 30px 0 10px 25%; ">
                        <div class="col-md-6 offset-md-3">
                          <button type="reset" class="btn btn-primary"><i class="fa fa fa-eraser"></i> Hủy</button>
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              <!-- Danh sách -->
              </div>
              <div class="tab-pane fade" id="profile-tab" role="tabpanel" aria-labelledby="list">
                <div class="col-md-12 col-sm-12  ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>DANH SÁCH CÁC ĐỢT KÊ KHAI</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="table table-striped" style="text-align: center">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Ngày Bắt Đầu</th>
                            <th>Ngày Kết Thúc</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                          $i=1;
                          @endphp
                          @foreach($DanhSachDKK as $ds)
                          <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{ date('d-m-Y', strtotime($ds['ThoiGianBatDau'])) }}</td>
                            <td>{{ date('d-m-Y', strtotime($ds['ThoiGianKetThuc'])) }}</td>
                            @if ($ds['Enable'] == 0)
                              <td>Đã đóng</td>
                            @elseif ($ds['Enable'] == 1)
                              <td>Đang mở</td>
                            @endif
                            
                            @if ($ds['Enable'] == 1)
                              <td><a href="{{route('dong-dkk', ['id' => $ds['MaDot']])}}" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i> Đóng Đợt</a></td>
                            @else
                              <td></td>
                            @endif
                  
                          </tr>
                          @php
                          $i++;
                          @endphp
                          @endforeach
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