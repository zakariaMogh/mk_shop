<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mk_Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f19199" />
    <meta name="keywords" content="website,e-commerce,constantine,shop,shopping,e-store,fashion,fammes,women " />
    <meta name="description" content="Une platforme web pour la vente des vêtements et produits dédiées aux femmes.. " />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Mk_SHOP" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="{{asset('front-assets/images/favicon.png')}}" />
    <meta property="og:description" content="Une platforme web pour la vente des vêtements et produits dédiées aux femmes.." />

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


   <style>
       .isChecked{
           border:.2px solid #f19199!important;
           color: #f19199;
           border-radius: 10px;
           background-color: rgba(245, 199, 203, 0.14) !important;
       }
       .buy__now__btn a{
           width: 300px!important;
       }
       .login input{
           margin: 0!important;
           margin-top: 20px!important;
           margin-bottom: 20px!important;
       }

       @media (max-width: 768px) {
           .product__menu a{
               font-size: 14px;
           }
           .__title{
               font-size: 18px;

           }
           .category-menu-list ul li:hover .category-menu-dropdown {
               opacity: 1;
               left: 20%!important;
               top: 100%;
               transition: ease-in 0.5s;
               visibility: visible;
               display: inline-block;
           }
       }

   </style>
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
