@extends('admin.main')

@section('content')
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
                  <div id="wizard" class="form_wizard wizard_horizontal" style="margin-top: 30px;">
                    <form method="POST" class="form-horizontal form-label-left" action="">
                      @csrf
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Ngày Bắt Đầu<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                          <input class="form-control" class='date' type="date" name="Ngay-bat-dau" required='required'>
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Ngày Kết Thúc<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='date' type="date" name="Ngay-ket-thuc" required='required'></div>
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
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Mã Đợt</th>
                            <th>Ngày Bắt Đầu</th>
                            <th>Ngày Kết Thúc</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @if( count($dkk) > 0 )
                          @foreach($dkk as $dkk)
                              <tr>
                                <td scope="row">{{ $i }}</td> 
                                <td>{{$dkk['MaDot']}}</td>
                                <td>{{  date('d-m-Y', strtotime($dkk['ThoiGianBatDau'])) }}</td>
                                <td>{{  date('d-m-Y', strtotime($dkk['ThoiGianKetThuc'])) }}</td>
                              </tr>
                            @php
                            $i++;
                            @endphp 
                          @endforeach
                          @else
                            
                          @endif
                          <!--<tr>
                            <th scope="row">1</th>
                            <td>D2021</td>
                            <td>11-01-2021</td>
                            <td>30-12-2021</td>
                          </tr>
                          <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>-->
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
@endsection