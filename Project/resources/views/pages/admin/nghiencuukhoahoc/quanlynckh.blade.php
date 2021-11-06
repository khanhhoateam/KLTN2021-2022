
@extends('main')

@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>QUẢN LÝ HOẠT ĐỘNG</h3>
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
                <a class="nav-link active" id="create" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Danh Sách Hoạt Động</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="list" data-toggle="tab" href="#profile-tab" role="tab" aria-controls="profile" aria-selected="false">Chi Tiết Hoạt Động</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade" id="profile-tab" role="tabpanel" aria-labelledby="list">
                <!-- Content -->
                <div class="x_content">
                  <div id="wizard" class="form_wizard wizard_horizontal" style="margin-top: 30px;">
                    <form method="" class="form-horizontal form-label-left">
                      <div class="field item form-group">
                        <label class="col-form-label col-md-4 col-sm-4  label-align">Nhập Mã Hoạt Động Kê Khai<span class="required">*</span></label>
                        <div class="col-md-5 col-sm-5 input-group">
                          <input type="text" class="form-control" placeholder="Nhập ...">
                          <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">Tìm!</button>
                          </span>
                        </div>
                      </div>
                    </form>
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Bảng Chi Tiết Hoạt Động Được Kê Khai</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <br />
                          <form class="form-horizontal form-label-left">
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Mã Hoạt Động </label>
                              <div class="col-md-5 col-sm-5 ">
                                <input type="text" class="form-control" placeholder="" readonly>
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Giảng Viên Kê Khai</label>
                              <div class="col-md-5 col-sm-5 ">
                                <input type="text" class="form-control" placeholder="" readonly>
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Trạng Thái</label>
                              <div class="col-md-5 col-sm-5 ">
                                <select id="heard" class="form-control">
                                  <option value="">Trạng Thái</option>
                              </select>
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Tên Hoạt động</label>
                              <div class="col-md-5 col-sm-5 ">
                                <input type="text" class="form-control" placeholder="">
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Thể Loại</label>
                              <div class="col-md-5 col-sm-5 ">
                                <input type="text" class="form-control" placeholder="" >
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Hạn Sử Dụng</label>
                              <div class="col-md-5 col-sm-5 ">
                                <input class="form-control" type="text" name="date">
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Tiêu đề</label>
                              <div class="col-md-5 col-sm-5 ">
                                <input class="form-control" type="text" name="date" placeholder="" >
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Năm Xuất Bản</label>
                              <div class="col-md-5 col-sm-5 ">
                                <input class="form-control" type="text" name="date" placeholder="" >
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Nhà Xuất Bản</label>
                              <div class="col-md-5 col-sm-5 ">
                                <input class="form-control" type="text" name="date" placeholder="" >
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Tên Tạo chí</label>
                              <div class="col-md-5 col-sm-5 ">
                                <input class="form-control" type="text" name="date" placeholder="" >
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Số Phát Hành</label>
                              <div class="col-md-5 col-sm-5 ">
                                <input class="form-control" type="text" name="date" placeholder="" >
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Chuẫn Danh Mục</label>
                              <div class="col-md-5 col-sm-5 ">
                                <input class="form-control" type="text" name="date" placeholder="" >
                              </div>
                            </div>
                            <div class="form-group row ">
                              <label class="control-label col-md-4 col-sm-4 label-align">Mô Tả</label>
                              <div class="col-md-5 col-sm-5 ">
                                <textarea class="resizable_textarea form-control" placeholder="" ></textarea>
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
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Nguyễn Thị An</td>
                                  <td>Tác giả</td>
                                  <td>300</td>
                                </tr>
                              </tbody>
                            </table>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Danh sách -->
              <div class="tab-pane fade  show active" id="home" role="tabpanel" aria-labelledby="create">
                <div class="col-md-12 col-sm-12  ">
                  <br>
                  <form method= "" action="" class="form-horizontal form-label-left">
                  @csrf
                    <div class="col-md-3 col-sm-3">
                      <select id="heard" class="form-control" required>
                          <option value="">Đợt kê khai</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                      </select>
                    </div>
                    <div class="col-md-2 col-sm-2">
                      <select id="heard" class="form-control" required>
                          <option value="">Trạng thái</option>
                      </select>
                      <br>
                    </div>
                    <div class="clearfix"></div>
                    <div class="x_content">
                      <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xóa Đã Chọn</a>
                          <thead>
                            <tr class="headings">
                              <th>
                                <input type="checkbox" id="check-all" class="flat">
                              </th>
                              <th class="column-title">STT</th>
                              <th class="column-title">Mã Kê Khai Hoạt Động</th>
                              <th class="column-title">Giảng Viên Kê Khai</th>
                              <th class="column-title">Tên Hoạt Động</th>
                              <th class="column-title">Hạn Sử Dụng</th>
                              <th class="column-title">Đợt Kê Khai</th>
                              <th class="column-title">Trạng Thái</th>
                              <th class="column-title no-link last"><span class="nobr">Chức Năng</span>
                              </th>
                              <th class="bulk-actions" colspan="8">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                            </tr>
                          </thead>
      
                          <tbody>
                            
                          </tbody>
                        </table>
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
@endsection
