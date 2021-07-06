@extends('front.layouts.app')

@section('content')
    <!-- Start Feature Product -->
    <section class="categories-slider-area bg__white">
        <div class="container">
            <div class="row">
                <!-- Start Left Feature -->
                <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                    <!-- Start Slider Area -->
                    <div class="slider__container slider--one">
                        <div class="slider__activation__wrap owl-carousel owl-theme">

                            <!-- Start Single Slide -->
                            @foreach($banners as $banner)
                            <div class="slide slider__full--screen slider-height-inherit  slider-text-left"
                                 style="background: rgba(0, 0, 0, 0) url({{asset($banner->image_url)}}) no-repeat scroll center center / cover ;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 ">
                                            <div class="slider__inner">
                                                <div style="background: rgba(222,216,216,0.69);padding:  20px">
                                                    <h1>{{$banner->title}} </h1>
{{--                                                    <span class="text--theme">Collection</span>--}}
                                                    <div class="slider__btn">
                                                        <a class="htc__btn" href="{{$banner->link}}" target="_blank">shop now</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <!-- End Single Slide -->
                        </div>
                    </div>
                    <!-- Start Slider Area -->
                </div>
                <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                    <div class="categories-menu mrg-xs">
                        <div class="category-heading">
                            <h3> Browse Categories</h3>
                        </div>
                        <div class="category-menu-list">
                            <ul>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="#">
                                            <img alt="" src="{{asset($category->image_url)}}">
                                            {{$category->name}}
                                            <i class="zmdi zmdi-chevron-right"></i></a>
                                        @if($category->children->isNotEmpty())
                                            <div class="category-menu-dropdown row">
                                                <div class=" category-common mb--30 col-sm-8">
                                                    <h4 class="categories-subtitle w-100"> {{$category->name}} </h4>
                                                    <ul>
                                                        @foreach($category->children as $c)
                                                            <li><a href="#"> {{$c->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-sm-4">
                                                    <img alt="" src="{{asset($category->image_url)}}">
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Left Feature -->
            </div>
        </div>
    </section>
    <!-- End Feature Product -->


    <!-- Start TRENDING -->
    <section class="htc__blog__area bg__white pt--30 pb--30">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{route('shop', ['trending' => 1])}}" class="section__title row">
                        <h2 class="title__line col-lg-3 text-start">Tendance </h2>
                        <span class="col-lg-8" style="border-bottom: 1px solid #797979; height: 20px"></span>
                        <span class=" col-lg-1 text-right p-3">see all > </span></span>
                    </a>
                </div>
            </div>
            <!-- End Product MEnu -->
            <div class="row">
                <div class="product__list another-product-style">
                    <!-- Start Single Product -->
                    @foreach($trending_products as $product)
                        <x-product-card :product="$product"/>
                @endforeach
                <!-- End Single Product -->
                </div>
            </div>
            <!-- Start Load More BTn -->

        </div>
    </section>
    <!-- End TRENDING -->


    <!-- Start latest -->
    <section class="htc__blog__area bg__white pt--30 pb--30">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{route('shop')}}" class="section__title row">
                        <h2 class="title__line col-lg-3 text-start">Latest</h2>
                        <span class="col-lg-8" style="border-bottom: 1px solid #797979; height: 20px"></span>
                        <span class=" col-lg-1 text-right p-3">see all > </span></span>
                    </a>
                </div>
            </div>
            <!-- End Product MEnu -->
            <div class="row">
                <div class="product__list another-product-style">
                    <!-- Start Single Product -->
                    @foreach($latest_products as $product)
                        <x-product-card :product="$product"/>
                @endforeach
                <!-- End Single Product -->


                </div>
            </div>
            <!-- Start Load More BTn -->

        </div>
    </section>
    <!-- End latest -->

    <!-- Start promotion -->
    <section class="htc__blog__area bg__white pt--30 pb--30">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{route('shop', ['promotion' => 1])}}" class="section__title row">
                        <h2 class="title__line col-lg-3 text-start">Promotion </h2>
                        <span class="col-lg-8" style="border-bottom: 1px solid #797979; height: 20px"></span>
                        <span class=" col-lg-1 text-right p-3">see all > </span></span>
                    </a>
                </div>
            </div>
            <!-- End Product MEnu -->
            <div class="row">
                <div class="product__list another-product-style">
                    <!-- Start Single Product -->
                    @foreach($discount_products as $product)
                        <x-product-card :product="$product"/>
                @endforeach
                <!-- End Single Product -->


                </div>
            </div>
            <!-- Start Load More BTn -->

        </div>
    </section>
    <!-- End promotion -->
@endsection
