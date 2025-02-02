<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>SocialV - Responsive Bootstrap 4 Admin Dashboard Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{asset('template/css/typography.css')}}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{asset('template/css/style.css')}}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{asset('template/css/responsive.css')}}">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
          <div id="container-inside">
              <div id="circle-small"></div>
              <div id="circle-medium"></div>
              <div id="circle-large"></div>
              <div id="circle-xlarge"></div>
              <div id="circle-xxlarge"></div>
          </div>
            <div class="container p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center pt-5">
                        <div class="sign-in-detail text-white">
                            <!-- <a class="sign-in-logo mb-5" href="#"><img src="{{asset('template/images/logo-full.png')}}" class="img-fluid" alt="logo"></a> -->
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="{{asset('template/images/login/1.png')}}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="{{asset('template/images/login/2.png')}}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="{{asset('template/images/login/3.png')}}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 bg-white pt-5">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Sign Up</h1>
                            <p>Enter your email address and password to access admin panel.</p>
                            <form class="mt-4" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Your Full Name</label>
                                    <input type="text" id="name" class="form-control mb-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Email address</label>
                                    <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Sign Up</button>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a href="login">Log In</a></span>
                                    <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                        <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                        <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{asset('template/js/jquery.min.js')}}"></script>
      <script src="{{asset('template/js/popper.min.js')}}"></script>
      <script src="{{asset('template/js/bootstrap.min.js')}}"></script>
      <!-- Appear JavaScript -->
      <script src="{{asset('template/js/jquery.appear.js')}}"></script>
      <!-- Countdown JavaScript -->
      <script src="{{asset('template/js/countdown.min.js')}}"></script>
      <!-- Counterup JavaScript -->
      <script src="{{asset('template/js/waypoints.min.js')}}"></script>
      <script src="{{asset('template/js/jquery.counterup.min.js')}}"></script>
      <!-- Wow JavaScript -->
      <script src="{{asset('template/js/wow.min.js')}}"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{asset('template/js/apexcharts.js')}}"></script>
      <!-- lottie JavaScript -->
      <script src="{{asset('template/js/lottie.js')}}"></script>
      <!-- Slick JavaScript --> 
      <script src="{{asset('template/js/slick.min.js')}}"></script>
      <!-- Select2 JavaScript -->
      <script src="{{asset('template/js/select2.min.js')}}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{asset('template/js/owl.carousel.min.js')}}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{asset('template/js/jquery.magnific-popup.min.js')}}"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{asset('template/js/smooth-scrollbar.js')}}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{asset('template/js/chart-custom.js')}}"></script>
      <!-- Custom JavaScript -->
      <script src="{{asset('template/js/custom.js')}}"></script>
   </body>
</html>