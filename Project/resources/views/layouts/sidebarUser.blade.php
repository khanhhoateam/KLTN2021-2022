<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.php" class="site_title"><i class="fa fa-ra"></i> <span>SUVI Scientific</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="{{ Auth::user()->avatar }}" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Xin Chào,</span>
        <h2>{{Auth::user()->name}}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>TỔNG QUAN</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-home"></i> Trang Chủ <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Trang Chủ</a></li>
              <li><a href="#">Trang Báo</a></li>
              <li><a href="#">Giới Thiệu</a></li>
            </ul>
          </li>
          <li><a href="{{ route('ho-so') }}"><i class="fa fa-edit"></i> Quản lý hồ sơ</a></li>
          <li><a href="{{route('nckh_gvtg')}}"><i class="fa fa-plus-square"></i> Kê khai hoạt động </a></li>
          <li><a href="{{route('ds-nckh')}}"><i class="fa fa-table"></i> Danh sách NCKH kê khai</a></li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer  buttons  not fix-->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Cài Đặt">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Toàn Màn Hình">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Khóa">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Đăng Xuất" href="dangnhap.php">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>

