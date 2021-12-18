@php
  use App\Http\Services\User\GiangVienServices;
  use App\Http\Services\Admin\MienGiamServices;
@endphp

@extends('mainUser')

@section('content')
<!-- /page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{ $title }}</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="">
      @include('layouts.alert')
      <div class="col-md-12 col-sm-12 ">
        <div id="wizard" class="form_wizard wizard_horizontal" style="margin-top: 30px;">
          <form class="form-horizontal form-label-left" method="POST" action="">
            @csrf
            <input name="MaGiangVien" hidden value="{{ GiangVienServices::getIDByName(Auth::user()->name)[0]["MaGiangVien"] }}">
            <input name="MaDot" hidden value="{{ $ThongTinDot['MaDot'] }}">
            <input name="ThoiGianBatDau" hidden value="{{ $ThongTinDot['ThoiGianBatDau'] }}">
            <input name="ThoiGianKetThuc" hidden value="{{ $ThongTinDot['ThoiGianKetThuc'] }}">
            <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Chọn  Miễn Giảm<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <select id="heard" name="MaMienGiam" class="form-control" required>
                  <option value="">Chọn ....</option>
                  @foreach ($DanhSachMienGiam as $dsmg)
                  <option value="{{ $dsmg['MaMienGiam'] }}">{{ $dsmg['TenMienGiam'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group" style="margin: 30px 0 30px 15%; ">
              <div class="col-md-6 offset-md-3">
                  <button type='submit' class="btn btn-success"><i class="fa fa-plus-square"></i> Khai Báo Miễn Giảm</button>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 " style="font-size: medium; margin-top: 30px;">
              <div class="x_panel">
                <div class="x_title">
                  <h2><small>CÁC CHẾ ĐỘ MIỄN GIẢM ĐÃ KHAI BÁO</small></h2>
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
                        <th>Trạng Thái</th>
                        <th  style="width: 10%">Cài Đặt</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $i=1;
                      @endphp
                      @foreach ($ChiTietMienGiam as $ctmg)
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ MienGiamServices::getMienGiamByID($ctmg['MaMienGiam'])[0]['TenMienGiam'] }}</td>
                        <td>
                        @if (MienGiamServices::getMienGiamByID($ctmg['MaMienGiam'] )[0]['DiemMienGiam'] != 0)
                          {{ MienGiamServices::getMienGiamByID($ctmg['MaMienGiam'])[0]['DiemMienGiam'] }}
                        @elseif(MienGiamServices::getMienGiamByID($ctmg['MaMienGiam'])[0]['TyLeMienGiam'] == 0 && MienGiamServices::getMienGiamByID($ctmg['MaMienGiam'])[0]['DiemMienGiam'] == 0)
                          {{ MienGiamServices::getMienGiamByID($ctmg['MaMienGiam'])[0]['DiemMienGiam'] }}
                        @else
                          -
                        @endif
                        </td>
                        <td>
                          @if (MienGiamServices::getMienGiamByID($ctmg['MaMienGiam'])[0]['TyLeMienGiam'] != 0 && MienGiamServices::getMienGiamByID($ctmg['MaMienGiam'])[0]['DiemMienGiam'] == 0)
                            {{ MienGiamServices::getMienGiamByID($ctmg['MaMienGiam'])[0]['TyLeMienGiam']*100 ."%" }}
                          
                          @else
                            -
                          @endif
                        </td>
                        <td>
                          @if($ctmg['TrangThai'] == 0)
                            Chờ Duyệt
                          @elseif ($ctmg['TrangThai'] == 1)
                            Đã Duyệt
                          @elseif ($ctmg['TrangThai'] == 2)
                            Không Duyệt
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('xoa-mg-user', ['id' => $ChiTietMienGiam[0]['MaMienGiam']]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xóa </a>
                        </td>
                      </tr>
                        @php
                          $i++;
                        @endphp
                      @endforeach
                    </tbody>
                    <tfoot>
                      
                    </tfoot>
                  </table>
                </div>
              </div>
            </div> 
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
<!-- End page content -->
@endsection