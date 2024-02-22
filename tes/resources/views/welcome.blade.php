<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Domain And Ip Reputation Tracker</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <div id="mySidepanel" class="sidepanel">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
         <a href="#">Home</a>
         <a href="#about">About</a>
         <a href="#we_Do">We Do</a>

         <a href="#contact">Contact Us</a>
         <a href="{{url('/reputationTracker')}}">Reputation Tracker</a>
         @auth

            @can('super_admin')
               <a href="{{route('home')}}">Dashboard</a>
            @endcan
            @if(auth()->user()->email_verified_at != '')
            <a href="{{url('/spamhaus_ip')}}">Spamhaus</a>
            @endif
            
            <a href="{{route('logout')}}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
               @csrf
            </form>
         @else
            <a href="{{route('login')}}">Login</a>
         @endauth
      </div>
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                     <div class="sea_icon d_none ">
                        <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           {{-- <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div> --}}
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                     <div class="right_bottun">
                        <button class="openbtn" onclick="openNav()"><img src="images/menu_icon.png" alt="#"/> </button> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div id="banner1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#banner1" data-slide-to="0" class="active"></li>
               <li data-target="#banner1" data-slide-to="1"></li>
               <li data-target="#banner1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="text-bg">
                           <h1>Domain and Ip</h1>
                           <span>Reputation Tracking system</span>
                           <a class="read_more" href="{{ url('/reputationTracker')}}">Try For Free</a>
                           <ul class="social_team">
                              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>

            </div>

         </div>
      </section>
      <!-- end banner -->
      <!-- about section -->
      <div id="about" class="about">
         <div class="container">
            <div class="row ">
               <div class="col-lg-5 col-12">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="titlepage">
                           <h2>About</h2>
                           <p>&nbsp&nbsp Introducing our cutting-edge web platform, dedicated to providing a Simple IP and Domain Reputation Tracking System. With a sleek and intuitive interface, users can swiftly input IPs and domains to receive comprehensive reputation feedback. Leveraging robust data sources and advanced algorithms, our system delivers accurate assessments, empowering users to swiftly identify security threats and malicious activities associated with specified entities. Through real-time monitoring and analysis, our platform ensures proactive threat detection, enhancing overall cybersecurity resilience.<br />

                            &nbsp&nbsp Our platform is designed to cater to a wide range of users, from individual website owners to enterprise-level security professionals. Whether you're safeguarding personal blogs, e-commerce sites, or corporate networks, our system offers unparalleled ease of use and reliability. Stay ahead of potential threats with our proactive monitoring capabilities, enabling swift response to emerging security risks.</p>
                        </div>
                     </div>

                  </div>
               </div>
               <div class="col-lg-7 col-12">
                  <div class="about_right">
                     <figure><img src="images/about_right.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section -->
      <!-- software section -->
      <div class="software">
         <div class="container-fluid">
            <div class="row d_flex">
               {{-- <div class="col-md-4"> --}}
                  <div class="titlepage">
                     <h2>Reputation Tracker</h2>
                     <p>&nbsp&nbsp A Reputation Tracking System monitors online sentiment and credibility across digital platforms. It offers insights into user-generated content, reviews, and interactions, empowering businesses to manage their online reputation effectively. Through sophisticated analysis, it helps organizations identify trends, address negative feedback, and maintain brand integrity. </p>
                     <a class="read_more" href="#">Click here</a>
                  </div>
               {{-- </div> --}}
               {{-- <div class="col-md-8 padding_right2"> --}}
                  <div class="software_img">
                     <figure><img src="images/software_img.jpg" alt="#"/></figure>
                  </div>
               {{-- </div> --}}
            </div>
         </div>
      </div>
      <!-- software section -->
      <!-- We Do section -->
      <div id="we_Do" class="we_do">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>What Our Sytem Does</h2>
                     <p>Our system provides comprehensive monitoring and analysis of online reputation, empowering users to proactively manage their digital presence. </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div id="hover_color" class="we_box">
                     <span>1</span>
                     <h3>Domain Checker</h3>
                     <p>Domain reputation tracking services, offering real-time monitoring and alerts to safeguard against potential threats and maintain online credibility. With advanced algorithms.
                     </p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div id="hover_color" class="we_box">
                     <span>2</span>
                     <h3>Ip Address <br> Checker</h3>
                     <p>Providing quick and accurate assessments to identify potential security risks or suspicious activities associated with IPs. With real-time monitoring and advanced analysis.
                     </p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div id="hover_color" class="we_box">
                     <span>3</span>
                     <h3>Reputation Tracker</h3>
                     <p>Our reputation tracking service offers comprehensive monitoring and analysis, empowering clients to manage their online credibility effectively and proactively address potential risks. </p>
                  </div>
               </div>
               <div class="col-md-12">
                  <a class="read_more" href="#">Read More</a>
               </div>
            </div>
         </div>
      </div>
      <!-- end We Do section -->

      <!-- contact section -->
      <div id="contact" class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Request  A  Call  Back</h2>
                     <p>Request a call back for personalized assistance and support tailored to your needs. </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="con_bg">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6">
                     <form id="request" class="main_form">
                        <div class="row">
                           <div class="col-md-12 ">
                              <input class="contactus" placeholder="Name" type="type" name="Name"> 
                           </div>
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Email" type="type" name="Email"> 
                           </div>
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Phone Number" type="type" name="Phone Number">                          
                           </div>
                           <div class="col-md-12">
                              <input class="contactusmess" placeholder="Message" type="type" Message="Name">
                           </div>
                           <div class="col-md-12">
                              <button class="send_btn">Send</button>
                           </div>
                           <div class="col-md-12">
                              <ul class="location_form">
                                 <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>
                                    (+71) 1234567890 (+71) 1234567890
                                 </li>
                                 <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>demo@gmail.com</li>
                              </ul>
                           </div>
                           <div class="col-md-12">
                              <ul class="social_icon">
                                 <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6 padding_right2">
                     <div class="map_section">
                        <div id="map">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact section -->

      <!--  footer -->

            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© {{date('Y')}} All Rights Reserved. Design by<a href="#"> E-Impact Team</a></p>
                     </div>
                  </div>
               </div>
            </div>

      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{ asset('js/jquery.min.js')}}"></script>
      <script src="{{ asset('js/popper.min.js')}}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js')}}"></script>
      <!-- sidebar -->
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{ asset('js/custom.js')}}"></script>
      <script>
         function openNav() {
           document.getElementById("mySidepanel").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidepanel").style.width = "0";
         }
      </script>
      <script>
         // This example adds a marker to indicate the position of Bondi Beach in Sydney,
         // Australia.
         function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
             zoom: 11,
             center: {lat: 40.645037, lng: -73.880224},
             });
         
         var image = 'images/maps-and-flags.png';
         var beachMarker = new google.maps.Marker({
             position: {lat: 40.645037, lng: -73.880224},
             map: map,
             icon: image
           });
         }
      </script>
      <!-- google map js -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
      <!-- end google map js --> 
   </body>
</html>

