<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Faizal_vlog</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/vlog/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/vlog/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('assets/vlog/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('assets/vlog/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('assets/vlog/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="{{ asset('assets/vlog/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/vlog/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="container-fluid">
            {{-- <nav class="navbar navbar-light bg-light justify-content-between">
               <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="index.html">Home</a>
                  <a href="yoga.html">Yoga</a>
                  <a href="thinking.html">Thinking</a>
                  <a href="runing.html">Runing</a>
               </div>
               <span style="font-size:30px;cursor:pointer; color: #fff;" onclick="openNav()"><img src="{{ asset('assets/vlog/images/toggle-icon.png')}}"></span>
               <a class="logo" href="index.html"><img src="{{ asset('assets/vlog/images/logo.png')}}"></a></a>
               <form class="form-inline ">
                  <div class="login_text">
                     <ul>
                        <li><a href="#"><img src="{{ asset('assets/vlog/images/user-icon.png')}}"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/vlog/images/search-icon.png')}}"></a></li>
                     </ul>
                  </div>
               </form>
            </nav> --}}
         </div>
      </div>
      <!-- header section end -->
      <!-- yoga section start -->
      <!--<div class="yoga_section layout_padding">-->
      <!--   <div class="container-fluid">-->
      <!--      <div class="womans_section_2">-->
      <!--         <div class="row">-->
      <!--            <div class="col-md-6">-->
      <!--               <div class="yoga_taital_main">-->
      <!--                  <h1 class="about_taital">{{$destination->destination_name}}</h1>-->
      <!--                  <p class="about_text">{{$destination->destination_vlog}}</p>-->
      <!--                  {{-- <div class="readmore_bt"><a href="#">Read More</a></div> --}}-->
      <!--               </div>-->
      <!--            </div>-->
      <!--            <div class="col-md-6 paddlin_right_0">-->
      <!--               <div class="yoga_img"><img src="{{ asset($destination->destination_image)}}"></div>-->
      <!--            </div>-->
      <!--         </div>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</div>-->
      <div class="yoga_section layout_padding">
        <div class="container">
            <h1 class="about_taital text-center">{{ $destination->destination_name }}</h1>
            <div class="text-center">
               <img src="{{ asset($destination->destination_image) }}" class="img-fluid" alt="..." style="max-width: 250px;">
            </div>
            <!--<p class="about_text" style="margin-bottom: 10px;">{{ $destination->destination_vlog }}</p>-->
            <p class="" style="margin-bottom: 900px; text-align: justify; font-size: 16px; color: black;">{{!! nl2br(e($destination->destination_vlog)) !!}}</p>
        </div>
        </div>
      <!-- yoga clothes section end -->
      <!-- footer section start -->
      {{-- <div class="footer_section layout_padding">
         <div class="container">
            <h1 class="footer_logo"><a href="index.html"><img src="{{ asset('assets/vlog/images/logo.png')}}"></a></h1>
            <div class="contact_main">
               <ul>
                  <li>
                     <a href="#">
                        <img src="{{ asset('assets/vlog/images/map-icon.png')}}">
                        <h5 class="address_main">
                           <span class="address_text">Address</span>
                           <span class="padding_15">Call +01 1234567890</span>
                        </h5>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <img src="{{ asset('assets/vlog/images/mail-icon.png')}}">
                        <h5 class="address_main">
                           <span class="address_text">Email</span>
                           <span class="padding_15">demo@gmail.com</span>
                        </h5>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <img src="{{ asset('assets/vlog/images/call-icon.png')}}">
                        <h5 class="address_main">
                           <span class="address_text">Phone</span>
                           <span class="padding_15">demo@gmail.com</span>
                        </h5>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="social_icon">
               <ul>
                  <li>
                     <a href="#"><img src="{{ asset('assets/vlog/images/fb-icon.png')}}"></a>
                  </li>
                  <li>
                     <a href="#"><img src="{{ asset('assets/vlog/images/twitter-icon.png')}}"></a>
                  </li>
                  <li>
                     <a href="#"><img src="{{ asset('assets/vlog/images/linkedin-icon.png')}}"></a>
                  </li>
               </ul>
            </div>
         </div>
      </div> --}}
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a> Distribution by <a href="https://themewagon.com">ThemeWagon</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{ asset('assets/vlog/js/jquery.min.js')}}"></script>
      <script src="{{ asset('assets/vlog/js/popper.min.js')}}"></script>
      <script src="{{ asset('assets/vlog/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{ asset('assets/vlog/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{ asset('assets/vlog/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{ asset('assets/vlog/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{ asset('assets/vlog/js/custom.js')}}"></script>
      <!-- javascript --> 
      <script src="{{ asset('assets/vlog/js/owl.carousel.js')}}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "100%";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script> 
   </body>
</html>