@extends('mainUser')

@section('content')
<div class="right_col" role="main">
  <!-- Auto Slider -->
    
    
  <!-- End Auto Slider -->
  <!-- Danh sách NCKH -->
  <br>
  <div class="container-fluid bg-3 text-center">
    <h3 class="margin">Nghiên cứu khoa học nổi bật</h3><br>
    <div class="row" style="display: inline-block;" >
      <div class="col-sm-4">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <img src="images/iuh1.jpg" class="img-responsive margin" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-4"> 
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <img src="images/iuh2.png" class="img-responsive margin" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-4"> 
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <img src="images/iuh3.jpg" class="img-responsive margin" style="width:100%" alt="Image">
      </div>
    </div>
  </div>
  <!-- Hết Hoạt Động NCKH -->
  <!-- Về Chúng Tôi -->
  <div class="container-fluid bg-3 text-center">
    <h3 class="margin">Thông tin về chúng tôi</h3><br>
    <div class="row" style="display: inline-block;" >
      <div class="card card-success">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-4">
              <div class="card mb-2 bg-gradient-dark">
                <img class="card-img-top" src="images/photo1.png" alt="Dist Photo 1">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-primary text-white">Card Title</h5>
                  <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
                  <a href="#" class="text-white">Last update 2 mins ago</a>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
              <div class="card mb-2">
                <img class="card-img-top" src="images/photo2.png" alt="Dist Photo 2">
                <div class="card-img-overlay d-flex flex-column justify-content-center">
                  <h5 class="card-title text-white mt-5 pt-2">Card Title</h5>
                  <p class="card-text pb-2 pt-1 text-white">
                    Lorem ipsum dolor sit amet, <br>
                    consectetur adipisicing elit <br>
                    sed do eiusmod tempor.
                  </p>
                  <a href="#" class="text-white">Last update 15 hours ago</a>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
              <div class="card mb-2">
                <img class="card-img-top" src="images/photo3.jpg" alt="Dist Photo 3">
                <div class="card-img-overlay">
                  <h5 class="card-title text-primary">Card Title</h5>
                  <p class="card-text pb-1 pt-1 text-white">
                    Lorem ipsum dolor <br>
                    sit amet, consectetur <br>
                    adipisicing elit sed <br>
                    do eiusmod tempor. </p>
                  <a href="#" class="text-primary">Last update 3 days ago</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Hết Về Chúng Tôi -->
</div>
        
@endsection
