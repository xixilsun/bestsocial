<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>SocialV - Responsive Bootstrap 4 Admin Dashboard Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('template/images/favicon.ico')}}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{asset('template/css/typography.css')}}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{asset('template/css/style.css')}}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{asset('template/css/responsive.css')}}">
      <style>
      #customFile .custom-file-control:lang(en)::after {
  content: "Select file...";
}

#customFile .custom-file-control:lang(en)::before {
  content: "Click me";
}

      </style>
   </head>
   <body class="right-column-fixed">
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         @include('template.partials.sidebar')
         <!-- TOP Nav Bar -->
         @include('template.partials.navbar')
         <!-- TOP Nav Bar END -->
         <!-- Right Sidebar Panel Start-->
         <!-- @include('template.partials.rightSidebar') -->
         <!-- Right Sidebar Panel End-->
         <!-- Page Content  -->
         @yield('content')
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      @include('template.partials.footer')
      <!-- Footer END -->
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
      <!-- lottie JavaScript -->
      <script src="{{asset('template/js/lottie.js')}}"></script>
      <!-- am core JavaScript -->
      <script src="{{asset('template/js/core.js')}}"></script>
      <!-- am charts JavaScript -->
      <script src="{{asset('template/js/charts.js')}}"></script>
      <!-- am animated JavaScript -->
      <script src="{{asset('template/js/animated.js')}}"></script>
      <!-- am kelly JavaScript -->
      <script src="{{asset('template/js/kelly.js')}}"></script>
      <!-- am maps JavaScript -->
      <script src="{{asset('template/js/maps.js')}}"></script>
      <!-- am worldLow JavaScript -->
      <script src="{{asset('template/js/worldLow.js')}}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{asset('template/js/chart-custom.js')}}"></script>
      <!-- Custom JavaScript -->
      <script src="{{asset('template/js/custom.js')}}"></script>
      @stack('scripts')
   </body>
</html>
