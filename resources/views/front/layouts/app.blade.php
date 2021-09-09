<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MkShop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front-assets/images/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('front-assets/apple-touch-icon.png')}}">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('front-assets/css/bootstrap.min.css')}}">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="{{asset('front-assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front-assets/css/owl.theme.default.min.css')}}">
    <!-- This core.css file contents all plugings css file.-->
    <link rel="stylesheet" href="{{asset('front-assets/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('front-assets/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('front-assets/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('front-assets/css/responsive.css')}}">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('front-assets/css/custom.css')}}">

    <link href="{{asset('admin-assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">


    <!-- Modernizr JS -->
    <script src="{{asset('front-assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    @stack('css')
</head>

<body>


<!-- Body main wrapper start -->
<div class="wrapper ">
    <!-- Start Header Style -->
@include('front.layouts.partials.navbar')
<!-- End Header Style -->

    <div class="body__overlay"></div>
    <!-- Start Offset Wrapper -->
    <div class="offset__wrapper">
        <!-- Start Search Popap -->
    @include('front.layouts.partials.search')
    <!-- End Search Popap -->

        <!-- Start Cart Panel -->
    @include('front.layouts.partials.cart')
    <!-- End Cart Panel -->
    </div>
    <!-- End Offset Wrapper -->

@yield('content')


<!-- Start Footer Area -->
@include('front.layouts.partials.footer')
<!-- End Footer Area -->
</div>
<!-- Body main wrapper end -->

<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="{{asset('front-assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
<!-- Bootstrap framework js -->
<script src="{{asset('front-assets/js/bootstrap.min.js')}}"></script>
<!-- All js plugins included in this file. -->
<script src="{{asset('front-assets/js/plugins.js')}}"></script>
<script src="{{asset('front-assets/js/slick.min.js')}}"></script>
<script src="{{asset('front-assets/js/owl.carousel.min.js')}}"></script>
<script>

    $(window).on('load', function () {
        $('.preloader-wrapper').fadeOut(200);
    });
</script>
<!-- Carousel -->
<script>
    $('.owl-product').owlCarousel({
        autoplay: false,
        loop: true,
        rtl: false,
        controls: false,
        margin: 10,
        responsiveClass: true,
        nav: false,
        responsive: {
            0: {
                items: 2,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: false,
                loop: true
            }
        }
    });
</script>
<!-- Waypoints.min.js. -->
<script src="{{asset('front-assets/js/waypoints.min.js')}}"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="{{asset('front-assets/js/main.js')}}"></script>



<script>
    $(".quick-view").click(function (e) {
        var bg = $(this).parents(".product__inner")
            .children(".pro__thumb")
            .css("background-image")
            .replace('url("', '')
            .replace('")', '');

        $("#quick-view-image").attr("src", bg);
    });
       $(".pot-small-img").first().addClass("active");
        $(".pot-small-img").click(function (e) {
            $(this).addClass("active").siblings().removeClass("active");
            let attr=$(this).find( "img" ).attr("src");
            $(".portfolio-full-image img").attr("src",attr );
        });
</script>
@stack('js')
</body>

</html>
