@extends('mainUser')

@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>{{$title}}</h3>
              </div>
              <div class="title_right">
                <div class="col-md-6 col-sm-6   form-group pull-right top_search">
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
                  <div class="col-md-12 col-sm-12 ">
                    <div class="x_title">
                      <h2>Bảng Chi Tiết Giảng Viên</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 col-sm-2">
                        <img src="{{ Auth::user()->avatar }}">
                      </div>
                      <div class="col-md-8 col-sm-8">
                        <div class="x_content">
                          <br />
                          <form class="form-horizontal form-label-left">
                            @foreach ($GiangVien as $gv)
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Mã Giảng Viên </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text"  name="" class="form-control" value="{{$MaGV}}" readonly>
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Họ Và Tên</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text"  name="" class="form-control" value="{{$gv['TenGiangVien']}}" > 
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Email</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text"  name="" class="form-control" value="{{$gv['Email']}}" >
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Số Điện Thoại</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text"  name="" class="form-control" value="{{$gv['SDT']}}" >
                              </div>
                            </div>
                            @endforeach
                            @foreach ($HocHam as $hh)
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Học Hàm</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text"  name="" class="form-control" value=" {{$hh['TenHocHam']}}">
                              </div>
                            </div>
                            @endforeach
                            @foreach ($MienGiam as $mg)
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Chế độ miễn giảm</label>
                              <div class="col-md-6 col-sm-6 ">
                                <textarea class="resizable_textarea form-control"  name="" readonly>{{$mg['TenMienGiam']}}</textarea>
                              </div>
                            </div>
                            @endforeach
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Điểm Định Mức Nghiên Cứu</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text"  name="" class="form-control" value="{{$hh['DiemDMHH']}}" readonly>
                              </div>
                            </div>
                            
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Tiến Độ Hoàn Thành</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text"  name="" class="form-control" value="" readonly>
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Đánh Giá</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text"  name="" class="form-control" value="{{$TongKet}}" readonly>
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Đợt Kê Khai</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text"  name="" class="form-control" value="{{ date('Y', strtotime($ThongTinDot['ThoiGianBatDau'])) }}" readonly>
                              </div>
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
	</div>
        
<!-- End page content -->
@endsection
