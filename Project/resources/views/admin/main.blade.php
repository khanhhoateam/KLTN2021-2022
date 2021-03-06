<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        @include('admin.sidebar')

        <!-- top navigation -->
        @include('admin.header')
        <!-- /top navigation -->

        @yield('content')
        
      </div>
    </div>
    <!-- footer content -->
    <footer>
      <div class="pull-right">
        <b>Scientific- Create by<span class="alert blue">Do Thi Thuy Quynh - Le Mai Khanh Hoa</span></b> 
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    @include('admin.footer')

  </body>
</html>


