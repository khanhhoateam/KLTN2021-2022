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
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Bảng Chi Tiết Kê Khai Hoạt Động </h2>
          <div class="clearfix"></div>
        </div>
        <hr>
        <br>
        <div class="x_content">
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
                  <option value="{{$tl['MaTheLoai']}}">{{$tl["TenTheLoai"]}}</option>
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
        </div>
      {{-- Bảng tạm lưu --}}
    </div>
  <div class="clearfix"></div>
</div>

<!-- End page content -->
@endsection
