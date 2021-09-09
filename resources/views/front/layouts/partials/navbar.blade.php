<header id="header" class="htc-header header--3 bg__white">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-xs-5 col-md-3">
                        <a href="{{route('home')}}">
                            <img src="{{asset('logo/mk_logo.png')}}" class="img-fluid" alt="logo">
                        </a>
                </div>
                <!-- Start MAinmenu Ares -->
                <div class="col-md-8 col-lg-8 col-sm-10 col-xs-10 hidden-xs hidden-sm">
                    <nav class="mainmenu__nav hidden-xs ">
                        <ul class="main__menu">
                            <li class="drop"><a href="{{route('home')}}">Accueille</a></li>
                            <li class="drop"><a href="{{route('shop')}}">Boutique</a></li>
                            <li class="drop"><a href="{{route('cart')}}">Panier</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="mobile-menu clearfix visible-xs visible-sm">
                        <nav id="mobile_dropdown">
                            <ul>
                                <li><a href="{{route('home')}}">Accueille</a></li>
                                <li><a href="{{route('shop')}}">Boutique</a></li>
                                <li><a href="{{route('cart')}}">Panier</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End MAinmenu Ares -->
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <ul class="menu-extra">
                        <li class="search search__open "><span class="ti-search"></span></li>
                        <li><a href="{{route('order.index')}}"><span class="ti-user"></span></a></li>
                        <li ><a href="{{route('cart')}}"><span class="ti-shopping-cart"></span></a></li>
{{--                        class="cart__menu"--}}
                        @auth
                            <li><a href="{{route('logout')}}">Déconnecter</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
