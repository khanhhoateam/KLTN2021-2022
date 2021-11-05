@extends('mainUser')

@section('content')
<!-- /page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>KÊ KHAI HOẠT ĐỘNG</h3>
      </div>
      <div class="title_right">
        
        
      </div>
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
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <br>
          <br/>
          <br/>
          <div class="col-md-12 col-sm-12">
            <form class="form-horizontal form-label-left" method="POST" action="">
              @csrf
              <input type="hidden" class="form-control" name="trang-thai" value="Chờ duyệt">
              <input type="hidden" class="form-control" name="gv-ke-khai" value="{{Auth::id()}}">
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align">Tên Hoạt Động NCKH </label>
                <div class="col-md-5 col-sm-5 ">
                  <input type="text" class="form-control" name="ten-hd">
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align">Thể Loại</label>
                <div class="col-md-5 col-sm-5 ">
                  <select id="heard" class="form-control" required name="the-loai">
                    <option value="">Chọn thể loại</option>
                    @foreach ($theloai as $tl)
                    <option value="{{$tl["MaTheLoai"]}}">{{$tl["TenTheLoai"]}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align">Hạn Sử Dụng</label>
                <div class="col-md-5 col-sm-5 ">
                  <input class="form-control" class='' type="text" name="hsd" placeholder="Nhập năm, VD: 03">
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align">File dẫn chứng</label>
                <div class="col-md-5 col-sm-5 ">
                  <input type="file" name="file">
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align">Mô Tả</label>
                <div class="col-md-5 col-sm-5 ">
                  <textarea class="resizable_textarea form-control" placeholder="" name="mo-ta"></textarea>
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align"><h4><u>Chi tiết bài viết:</u></h4></label>
                <div class="col-md-5 col-sm-5"></div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align">Tiêu đề</label>
                <div class="col-md-5 col-sm-5 ">
                  <input class="form-control" type="text" name="tieu-de" placeholder="">
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align">Năm Xuất Bản</label>
                <div class="col-md-5 col-sm-5 ">
                  <input class="form-control" type="text" name="nam-xb" placeholder="">
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align">Nhà Xuất Bản</label>
                <div class="col-md-5 col-sm-5 ">
                  <input class="form-control" type="text" name="nha-xb" placeholder="">
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align">Tên Tạo chí</label>
                <div class="col-md-5 col-sm-5 ">
                  <input class="form-control" type="text" name="tap-chi" placeholder="">
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align">Số Phát Hành</label>
                <div class="col-md-5 col-sm-5 ">
                  <input class="form-control" type="text" name="so-phat-hanh" placeholder="">
                </div>
              </div>
              <div class="form-group row ">
                <label class="control-label col-md-4 col-sm-4 label-align">Chuẫn Danh Mục</label>
                <div class="col-md-5 col-sm-5 ">
                  <input class="form-control" type="text" name="chuan-danh-muc" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-7 col-sm-7 label-align">
                  <button type="reset" class="btn btn-primary"><i class="fa fa-eraser"></i> Hủy</button>
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Kê Khai</button>
                </div>
              </div>
            </form>
            {{-- Bảng tạm lưu --}}
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
{{-- <script>
  var path = "{{route('autocomplete')}}";
  $('input.typehead').typehead({
    source: function(terms, process){
      return $.get(path,{term,terms},function(data){
        return process(data);
      });
    }
  });
</script> --}}

<!-- End page content -->
@endsection