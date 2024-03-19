<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Inshot - Creative Responsive Photography  Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/yourstyle.css') }}">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
</head>
<body>
<!-- loader -->
<div class="spinner">
    <div class="double-bounce1"></div>
    <div class="double-bounce2"></div>
</div>
<!-- loader end -->
<!--================= Main   ================-->
<div id="main">
    <x-layouts.header />
    <!--=============== wrapper ===============-->
    <div id="wrapper" class="heiginf">
        <!--Content -->
        <div class="content">
            <section class="big-pad-sec">
                <div class="container">
                    <!-- post -->
                    {{ $slot }}
                    <!-- post end-->
                    <!-- pagination   -->
                    <!-- pagination  end -->
                </div>
            </section>
        </div>
        <!-- content  end -->
    </div>
    <!-- wrapper end -->
    <!-- sidebar -->
    <div class="sb-overlay"></div>
    <div class="hiiden-sidebar-wrap">
        <!-- sb-widget-wrap-->
        <div class="sb-widget-wrap fl-wrap">
            <h3>About The Inshot</h3>
            <div class="sb-widget about-widget fl-wrap">
                <img src="images/about-sb.jpg" alt="">
                <p>Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus at leo dignissim congue. Mauris elementum  .</p>
            </div>
        </div>
        <!-- sb-widget-wrap end-->
        <!-- sb-widget-wrap-->
        <div class="sb-widget-wrap fl-wrap">
            <h3>SUBSCRIBE TO OUR NEWSLETTER</h3>
            <div class="sb-widget  fl-wrap">
                <p>Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet,  </p>
                <div class="subcribe-form fl-wrap">
                    <form id="subscribe">
                        <input class="enteremail" name="email" id="subscribe-email" placeholder="Your Email" spellcheck="false" type="text">
                        <button type="submit" id="subscribe-button" class="subscribe-button">Submit</button>
                        <label for="subscribe-email" class="subscribe-message"></label>
                    </form>
                </div>
            </div>
        </div>
        <!-- sb-widget-wrap end-->
        <!-- sb-widget-wrap-->
        <div class="sb-widget-wrap fl-wrap">
            <h3>Our Story  video </h3>
            <div class="sb-widge video-widget   fl-wrap">
                <img src="images/video-banner.jpg"  class="respimg" alt="">
                <a href="https://vimeo.com/77416730" class="image-popup"><i class="fa fa-play"></i></a>
            </div>
        </div>
        <!-- sb-widget-wrap end-->
        <!-- sb-widget-wrap-->
        <div class="sb-widget-wrap fl-wrap">
            <h3>We're Are Social</h3>
            <div class="sb-widget    fl-wrap">
                <div class="sidebar-social fl-wrap">
                    <ul>
                        <li><a href="#" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank" ><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank" ><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" target="_blank" ><i class="fa fa-tumblr"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- sb-widget-wrap end-->
        <!-- sb-widget-wrap-->
        <div class="sb-widget-wrap fl-wrap">
            <h3>Our Twitter</h3>
            <div class="sb-widget  fl-wrap">
                <div id="footer-twiit"></div>
                <a  href="#" target="_blank" class="twiit-button"> <i class="fa fa-twitter"></i> Follow Us</a>
            </div>
        </div>
        <!-- sb-widget-wrap end-->
    </div>
    <!-- sidebar end -->
    <!--search-form-holder -->
    <div class="search-form-holder fixed-search">
        <div class="search-form-bg"></div>
        <div class="search-form-wrap">
            <div class="container">
                <form class="searchform" method="get"  >
                    <input type="text" autocomplete="off"   name="s" placeholder="Type and Enter to Search">
                </form>
                <div class="close-fixed-search"></div>
            </div>
        </div>
    </div>
    <!--search-form-holder  end-->
    <!-- footer -->
    <footer class="scroll-footer">
        <div class="policy-box">
            <span>&#169; Inshot 2017  /  All rights reserved. </span>
        </div>
        <div class="footer-social">
            <ul>
                <li><a href="#" target="_blank" ><i class="fa fa-facebook"></i><span>facebook</span></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i><span>twitter</span></a></li>
                <li><a href="#" target="_blank" ><i class="fa fa-instagram"></i><span>instagram</span></a></li>
                <li><a href="#" target="_blank" ><i class="fa fa-pinterest"></i><span>pinterest</span></a></li>
                <li><a href="#" target="_blank" ><i class="fa fa-tumblr"></i><span>tumblr</span></a></li>
            </ul>
        </div>
    </footer>
    <!-- footer end -->
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/plugins.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/scripts.js')}}"></script>
</body>
</html>
