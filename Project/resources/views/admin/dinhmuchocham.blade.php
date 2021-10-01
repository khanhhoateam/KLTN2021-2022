@extends('admin.main')

@section('content')
<!-- /page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{ $title }}</h3>
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
            <h2 class="text-danger">Đợt 2021 từ 11/01/2021 - 30/12/2021</h2>
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
                <a class="nav-link active" id="create" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thiết Lập Học Hàm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="list" data-toggle="tab" href="#profile-tab" role="tab" aria-controls="profile" aria-selected="false">Danh Sách Học Hàm</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="create">
                <!-- Content -->
                <div class="x_content">
                  <div id="wizard" class="form_wizard wizard_horizontal" style="margin-top: 30px;">
                    <form method= "POST" action="" class="form-horizontal form-label-left">
                    @csrf
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Chọn Học Hàm<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                          <select class="form-control" name="TenHocHam" required>
                            <option value="">Chọn ... </option>
                            @foreach($tenhocham as $hocham)
                            <option value="{{ $hocham->TenHocHam }}">{{ $hocham->TenHocHam }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nhập điểm định mức<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='date' type="text" name="diem" required='required'></div>
                      </div>
                      <div class="form-group" style="margin: 30px 0 30px 15%; ">
                        <div class="col-md-6 offset-md-3">
                            <button type='reset' class="btn btn-primary"><i class="fa fa-eraser"></i> Hủy</button>
                            <button type='submit' name="action" class="btn btn-success" value='add'><i class="fa fa-plus-square"></i> Lưu </button>
                        </div>
                      </div>
                      </form>

                      <form method= "POST" action="../xoa" class="form-horizontal form-label-left">
                      @csrf
                      <div class="col-md-12 col-sm-12 " style="font-size: medium; margin-top: 30px;">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>BẢNG TẠM LƯU <small>CÁC HỌC HÀM KHỞI TẠO</small></h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <table class="table table-striped projects">
                              <thead>
                                <tr>
                                  <th style="width: 1%">STT</th>
                                  <th>Mã Học Hàm</th>
                                  <th>Tên Học Hàm</th>
                                  <th>Điểm Định Mức Học Hàm</th>
                                  <th  style="width: 10%">Cài Đặt</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $servername = "localhost";
                                  $username = "root";
                                  $password = "";
                                  $dbname = "qlkh";
                                  
                                  // Create connection
                                  $conn = new mysqli($servername, $username, $password, $dbname);
                                  // Check connection
                                  if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                  }
                                  
                                  $sql = "SELECT MaHocHam , TenHocHam, DiemDMHH FROM HocHam Where MaDot = '3'";
                                  $result = $conn->query($sql);
                                  
                                  if ($result->num_rows > 0) {
                                    // output data of each row
                                    $i=1;
                                    while($row = $result->fetch_assoc()) {
                                      echo '<tr>
                                      <td>'.$i.'</td>
                                      <td><input name="MaHocHam" id="MaHocHam" type="hidden" value="'.$row["MaHocHam"].'">'.$row["MaHocHam"].'</td>
                                      <td>'.$row["TenHocHam"].'</td>
                                      <td>'.$row["DiemDMHH"].'</td>
              
                                      <td>
                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xóa </button>
                                      </td>
                                      </tr>';
                                      $i++;
                                    }
                                  } else {
                                    echo "0 results";
                                  }
                                  $conn->close();
                                  
                                ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td colspan="4"></td>
                                  <td>
                                    <!--<button type="submit" name="action" class="btn btn-success btn-xs" value='save'><i class="fa fa-save"></i> Lưu </button>-->
                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div> 
                    </form>
                  </div>
                </div>
              </div>
              <!-- Danh sách -->
              <div class="tab-pane fade" id="profile-tab" role="tabpanel" aria-labelledby="list">
                <div class="col-md-12 col-sm-12  ">
                  <div class="x_panel">
                    <div class="x_title">
                      <div class="col-md-2 col-sm-2">
                        <select id="heard" class="form-control" required>
                          <option value="">Chọn đợt kê khai</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Mã Học Hàm</th>
                            <th>Tên Học Hàm</th>
                            <th>Điểm Định Mức Học Hàm</th>
                            <th>Mã Đợt</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>TL01</td>
                            <td>Thạc Sĩ</td>
                            <td>700</td>
                            <td>D2021</td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
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