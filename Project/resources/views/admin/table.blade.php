<!--<form method= "POST" action="xoa" class="form-horizontal form-label-left">
  @csrf-->
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
                  echo '
                  <form method= "POST" action="xoa" class="form-horizontal form-label-left">
                  @csrf
                  <tr>
                  <td>'.$i.'</td>
                  <td><input name="MaHocHam" id="MaHocHam" type="hidden" value="'.$row["MaHocHam"].'">'.$row["MaHocHam"].'</td>
                  <td>'.$row["TenHocHam"].'</td>
                  <td>'.$row["DiemDMHH"].'</td>

                  <td>
                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xóa </button>
                  </td>
                  </tr>
                  </form>';
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
<!--</form>-->