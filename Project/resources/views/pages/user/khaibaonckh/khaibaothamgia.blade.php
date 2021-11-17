@extends('mainUser')

@section('content')
<!-- /page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>KÊ KHAI HOẠT ĐỘNG</h3>
      </div>
      {{-- <div class="title_right">  
      </div> --}}
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Bảng Chi Tiết Kê Khai Hoạt Động </h2>
          <div class="clearfix"></div>
        </div>
        <hr>
        <br>
        <div class="x_content">
          <div class="col-md-12 col-sm-12">
            <div class="col-md-10 col-sm-10">
              <h2>Chi tiết thành phần tham gia</h3>
            </div>
              <form class="form-horizontal form-label-left" method="POST" action="{{route('luu-tam-nckh')}}">
                @csrf
                <div class="col-md-2 col-sm-2 left-col">
                  <button class="btn btn-success" type="submit" id="Thêm" >Thêm</button>
                </div>
                <div class="clearfix"></div>
                <br/>
                <div class="form-group row" >
                  <label class="control-label col-md-2 col-sm-2 label-align">Tên</label>
                  <div class="col-md-4 col-sm-4 ">
                    <input class="form-control typeahead" type="text" required id="autocomplete" name="ten-gv-tg" placeholder="Tên giảng viên">
                  </div>
                  <label class="control-label col-md-2 col-sm-2 label-align">Vai trò</label>
                  <div class="col-md-4 col-sm-4 ">
                    <select name="vai-tro" class="form-control" required>
                      <option value="">Chọn vai trò</option>
                      @foreach ($vaitro as $vt)
                        <option value="{{$vt["MaVaiTro"]}}">{{$vt["TenVaiTro"]}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </form>
          </div> 
          <div class="col-md-12 col-sm-12 " style="font-size: medium; margin-top: 30px;">
            <div class="x_panel">
              <div class="x_title">
                <h2>BẢNG TẠM LƯU <small>Chi Tiết Thành Phần Tham Gia</small></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table class="table table-striped projects">
                  <thead>
                    <tr>
                      <th style="width: 1%">STT</th>
                      <th>Tên Giảng Viên</th>
                      <th>Vai Trò</th>
                      <th  style="width: 10%">Cài Đặt</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $i=1;
                    @endphp
                    @if(count($giangvientg)>0)
                      @foreach ($giangvientg as $gvtg)
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$gvtg['TenGiangVien']}}</td>
                          <td>{{$vaitro[$gvtg['MaVaiTro']-1]['TenVaiTro']}}</td>
                          <td>
                            <a href="{{route('xoa-luu-tam-nckh', ['id'=>$gvtg['id']])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Xóa</a>
                          </td>
                        </tr>
                        @php
                          $i++;
                        @endphp
                      @endforeach
                    @endif
                  </tbody>
                  <tfoot> 
                    <tfoot>
                      <tr>
                        <td colspan="3"></td>
                        <td>
                        @if(count($giangvientg) > 0)
                          <a href="{{route('nckh')}}" class="btn btn-success btn-xs">
                            <i class="fa fa-save"></i>Khai báo</a>
                        @endif
                        </td>
                      </tr>
                    </tfoot>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <br>
          <br/>
          <br/>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>

<!-- End page content -->
@endsection