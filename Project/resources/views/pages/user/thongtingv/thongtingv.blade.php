@php
  use App\Http\Services\User\GiangVienServices;
  use App\Http\Services\Admin\MienGiamServices;
  use App\Http\Services\Admin\TongKetServices;
@endphp
@extends('mainUser')

@section('content')
<div class="right_col" role="main" style="min-height: 785px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{ $title }}</h3>
      </div>
      <div class="title_right">
        <div class="col-md-6 col-sm-6   form-group pull-right top_search">
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
          @include('layouts.alert')
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
              @foreach ($giangvien as $gv)
              <div class="col-md-8 col-sm-8">
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" method="POST" action=" {{route('sua_ho_so')}} ">
                    @csrf
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Họ Và Tên</label>
                      <input type="text" name="MaGiangVien" class="form-control" value="{{ $gv['MaGiangVien'] }}" hidden>
                       
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="TenGiangVien" class="form-control" value="{{ $gv['TenGiangVien'] }}" > 
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Email</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="Email" class="form-control" value="{{ $gv['Email'] }}" >
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Số Điện Thoại</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="SDT" class="form-control" value="{{ $gv['SDT'] }}" >
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Học Hàm</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="HocHam" class="form-control" value="{{ GiangVienServices::getHocHam($gv['MaGiangVien'])[0]['TenHocHam'] }}" >
                      </div>
                    </div>
                     <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Chế Độ Miễn Giảm</label>
                      <div class="col-md-7 col-sm-7 ">
                        <textarea class="resizable_textarea form-control" name="MienGiam" placeholder="" rows="5" cols="20" disabled>
                          @foreach ($miengiam as $mg)
                            @php
                              $diemmg = MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['DiemMienGiam'];
                              $tylemg = MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['TyLeMienGiam'];
                            @endphp
                            @if($diemmg == 0 && $tylemg != 0)
                            {{
                               "- ". MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['TenMienGiam']. ": tỷ lệ miễn giảm ".MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['TyLeMienGiam']*100 ."%";
                            }}
                            @elseif ($diemmg != 0 && $tylemg == 0)
                            {{
                              "- ". MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['TenMienGiam'] .": điểm miễn giảm ".MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['DiemMienGiam'];
                            }}
                            @elseif ($diemmg == 0 && $tylemg == 0)
                            {{
                              "- ". MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['TenMienGiam'] .": điểm miễn giảm ".MienGiamServices::getMienGiamByID($mg['MaMienGiam'])[0]['DiemMienGiam'];
                            }}
                            @endif
                          @endforeach
                        </textarea>
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Điểm Định Mức Nghiên Cứu</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="HocHam" class="form-control" value="{{ TongKetServices::getDiemDM($gv['MaGiangVien']) }}" disabled>
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Tiến Độ Hoàn Thành</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="HocHam" class="form-control" value="{{ TongKetServices::getDiemDanhGia($gv['MaGiangVien']) }}" disabled>
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Đánh Giá</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="HocHam" class="form-control" value="{{ $TongKet }}" disabled>
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="control-label col-md-4 col-sm-4 label-align">Đợt Kê Khai</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="HocHam" class="form-control" value="Đợt {{ date('Y', strtotime($ThongTinDot['ThoiGianBatDau'])) }} từ {{ date('d-m-Y', strtotime($ThongTinDot['ThoiGianBatDau'])) }} đến {{ date('d-m-Y', strtotime($ThongTinDot['ThoiGianKetThuc'])) }}" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-8 col-sm-8 label-align">
                        <button type="reset" class="btn btn-primary"><i class="fa fa-eraser"></i> Hủy</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="clearfix"></div>
</div>
</div>  
@endsection