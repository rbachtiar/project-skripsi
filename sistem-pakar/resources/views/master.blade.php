<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    

    <!-- Title -->
    <title>Konsultasi</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('user/img/core-img/dentis.png')}}">

    <!-- Core Stylesheet -->
    <link href="{{asset('user/style.css')}}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet">
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>

<body>
 
   

  
    <header class="header_area clearfix">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Menu Area Start -->
                <div class="col-12 h-100">
                    <div class="menu_area h-100">
                        <nav class="navbar h-100 navbar-expand-lg align-items-center">
                           <!-- Menu Area -->
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#olv-navbar" aria-controls="olv-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse justify-content-end" id="olv-navbar">
                                <ul class="navbar-nav animated" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('pre')}}">Konsultasi</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('info')}}">Info</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('kontak')}}">Kontak</a></li>
                                </ul>
                                <!-- Search Form Area Start -->
                                <div class="search-form-area animated">
                                    <form action="#" method="post">
                                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; hit enter">
                                        <button type="submit" class="d-none"><img src="{{asset('user/img/core-img/search-icon.png')}}" alt="Search"></button>
                                    </form>
                                </div>
                            
                                
                                <!-- Login btn -->
                                <div class="login-register-btn">
                                    <a href="{{url('login')}}">Login</a>
                                   
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
   
    
    @yield('content')  
        
        
    
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('user/js/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('user/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('user/js/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('user/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('user/js/active.js')}}"></script>
   <!-- for ajax user -->
   @yield('ajax')
    <script type="text/javascript">$(function () {
           $(".input input")
              .focus(function () {
                 $(this)
                    .parent(".input")
                    .each(function () {
                       $("label", this).css({
                          "line-height": "18px",
                          "font-size": "18px",
                          "font-weight": "100",
                          top: "0px"
                       });
                       $(".spin", this).css({
                          width: "100%"
                       });
                    });
              })
              .blur(function () {
                 $(".spin").css({
                    width: "0px"
                 });
                 if ($(this).val() == "") {
                    $(this)
                       .parent(".input")
                       .each(function () {
                          $("label", this).css({
                             "line-height": "60px",
                             "font-size": "24px",
                             "font-weight": "300",
                             top: "10px"
                          });
                       });
                 }
              });

           $(".button").click(function (e) {
              var pX = e.pageX,
                 pY = e.pageY,
                 oX = parseInt($(this).offset().left),
                 oY = parseInt($(this).offset().top);

              $(this).append(
                 '<span class="click-efect x-' +
                    oX +
                    " y-" +
                    oY +
                    '" style="margin-left:' +
                    (pX - oX) +
                    "px;margin-top:" +
                    (pY - oY) +
                    'px;"></span>'
              );
              $(".x-" + oX + ".y-" + oY + "").animate(
                 {
                    width: "500px",
                    height: "500px",
                    top: "-250px",
                    left: "-250px"
                 },
                 600
              );
              $("button", this).addClass("active");
           });

           $(".alt-2").click(function () {
              if (!$(this).hasClass("material-button")) {
                 $(".shape").css({
                    width: "100%",
                    height: "100%",
                    transform: "rotate(0deg)"
                 });

                 setTimeout(function () {
                    $(".overbox").css({
                       overflow: "initial"
                    });
                 }, 600);

                 $(this).animate(
                    {
                       width: "140px",
                       height: "140px"
                    },
                    500,
                    function () {
                       $(".box").removeClass("back");

                       $(this).removeClass("active");
                    }
                 );

                 $(".overbox .title").fadeOut(300);
                 $(".overbox .input").fadeOut(300);
                 $(".overbox .button").fadeOut(300);

                 $(".alt-2").addClass("material-buton");
              }
           });

           $(".material-button").click(function () {
              if ($(this).hasClass("material-button")) {
                 setTimeout(function () {
                    $(".overbox").css({
                       overflow: "hidden"
                    });
                    $(".box").addClass("back");
                 }, 200);
                 $(this).addClass("active").animate({
                    width: "700px",
                    height: "700px"
                 });

                 setTimeout(function () {
                    $(".shape").css({
                       width: "50%",
                       height: "50%",
                       transform: "rotate(45deg)"
                    });

                    $(".overbox .title").fadeIn(300);
                    $(".overbox .input").fadeIn(300);
                    $(".overbox .button").fadeIn(300);
                 }, 700);

                 $(this).removeClass("material-button");
              }

              if ($(".alt-2").hasClass("material-buton")) {
                 $(".alt-2").removeClass("material-buton");
                 $(".alt-2").addClass("material-button");
              }
           });
        });
        </script>
</body>

</html>