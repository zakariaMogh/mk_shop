<footer class="htc__foooter__area gray-bg">
    <div class="container">
        <div class="row">
            <div class="footer__container clearfix">
                <!-- Start Single Footer Widget -->
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="ft__widget">
                        <div class="ft__logo">
                            <a  href="{{route('home')}}">
                                <img src="{{asset('logo/mk_logo.png')}}" alt="footer logo" height="50">
                            </a>
                        </div>
                        <div class="footer-address">
                            <ul>
                                <li>
                                    <div class="address-icon">
                                        <i class="zmdi zmdi-pin"></i>
                                    </div>
                                    <div class="address-text">
                                        <p>{{$information->address}}, {{$information->province}}, {{$information->wilaya}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="address-icon">
                                        <i class="zmdi zmdi-email"></i>
                                    </div>
                                    <div class="address-text">
                                        <a href="#"> {{$information->email}}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="address-icon">
                                        <i class="zmdi zmdi-phone-in-talk"></i>
                                    </div>
                                    <div class="address-text">
                                        <p>{{$information->phone}} </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <ul class="social__icon">
                            <li><a href="https://www.instagram.com/meriemk___shop/" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                            <li><a href="https://www.facebook.com/Meriemkshop/" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
                <!-- Start Single Footer Widget -->
                <div class="col-md-3 col-lg-3 col-sm-6 smt-30 xmt-30">
                    <div class="ft__widget">
                        <h2 class="ft__title">Catégories</h2>
                        <ul class="footer-categories">
                            @foreach($categories as $category)
                                <li><a href="{{route('shop', ['category' => $category->slug])}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Start Single Footer Widget -->
                <div class="col-md-3 col-lg-3 col-sm-6 smt-30 xmt-30">
                    <div class="ft__widget">
                        <h2 class="ft__title">Informations</h2>
                        <ul class="footer-categories">
                            <li><a href="{{route('contact')}}">Contact</a></li>
                            <li><a href="{{route('privacy_policies')}}">Politique de confidentialité</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Copyright Area -->
        <div class="htc__copyright__area">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="copyright__inner">
                        <div class="copyright">
                            <p>© 2021 <b>Mk-shop</b></p>
                        </div>
                        <ul class="footer__menu">
                            <li><a href="{{route('home')}}">Accueille</a></li>
                            <li><a href="{{route('shop')}}">Produit</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area -->
    </div>
</footer>
