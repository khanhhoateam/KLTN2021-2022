<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{route('login')}}">
                @csrf
              <h1>ĐĂNG NHẬP</h1>
              <div>
                <input type="text" class="form-control" name="email" placeholder="Nhập địa chỉ email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required="" />
              </div>
              
              <div class="btndangnhap">
                <button class="btn btn-info submit" type="submit" >Đăng Nhập</button>
              </div>
              <br>
              <a class="reset_pass" href="#">Quên mật khẩu?</a>
              <div class="clearfix"></div>
              <div class="separator">
                <div>
                  <h1><i class="fa fa-ra"></i> IUH</h1>
                  <p>©2021 Tạo bởi Do Thi Thuy Quynh - Le Mai Khanh Hoa</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>