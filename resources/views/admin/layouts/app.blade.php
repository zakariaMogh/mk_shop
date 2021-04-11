<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description-gambolthemes" content="">
	<meta name="author-gambolthemes" content="">
    <link rel="icon" href="{{asset('logo/favicon.png')}}">
    <title>@yield('title','Admin Panel')</title>
	<link href="{{asset('admin-assets/css/styles.css')}}" rel="stylesheet">
	<link href="{{asset('admin-assets/css/admin-style.css')}}" rel="stylesheet">

	<!-- Vendor Stylesheets -->
	<link href="{{asset('admin-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('admin-assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    @stack('css')

</head>

    <body class="sb-nav-fixed">
        @include('admin.layouts.partials.navBar')
        <div id="layoutSidenav">
            @include('admin.layouts.partials.sideBar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </main>
                @include('admin.layouts.partials.footer')
            </div>
        </div>
        <script src="{{asset('admin-assets/js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('admin-assets/js/scripts.js')}}"></script>
        @stack('js')
    </body>

</html>
