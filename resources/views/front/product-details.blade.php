@extends('front.layouts.app')

@push('css')
@livewireStyles
@endpush

@section('content')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area"
     style="background: rgba(0, 0, 0, 0) url({{asset('front-assets/images/bg/2.jpg')}}) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Product Details</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="{{route('home')}}">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Product Details</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Details -->
<section class="htc__product__details pt--70 pb--70 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="product__details__container">
                    <ul class="product__small__images" role="tablist">
                        @foreach($product->images as $image)
                        <!-- Start Small images -->
                        <li role="presentation" class=" pot-small-img hidden-xs hidden-sm ">
                            <a href="javascript:void(0)">
                                <img src="{{asset($image->image_url)}}" alt="small-image"
                                     style="height: 100px;width: 100px">
                            </a>
                        </li>
                        <!-- End Small images -->

                        @endforeach

                    </ul>
                    <div class="product__big__images">
                        <div class="portfolio-full-image tab-content">
                            <img src="{{asset($product->image_url)}}" alt="full-image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                <div class="htc__product__details__inner">
                    <div class="pro__detl__title">
                        <h2>{{$product->name}}</h2>
                    </div>
                    <div class="pro__dtl__rating">
                        <ul class="pro__rating">
                            @for($i = 1 ; $i <= round($product->reviews->avg('pivot.rate')) ; $i++)
                            <li><span class="fas fa-star"></span></li>
                            @endfor
                            @for($i = 1 ; $i <= (5-round($product->reviews->avg('pivot.rate'))) ; $i++)
                            <li><span class="far fa-star"></span></li>
                            @endfor
                        </ul>
                        <span class="rat__qun">({{$product->reviews->count()}})</span>
                    </div>
                    <div class="pro__details">
                        <p>{!! $product->brand !!} </p>
                        <p>{!! $product->quality !!} </p>
                    </div>
                    <ul class="pro__dtl__prize">
                        @if($product->cashback > 0)
                        <li class="old__prize">{{$product->price}} DA</li>
                        <li>{{$product->cashback}} DA</li>
                        @else
                        <li>{{$product->price}} DA</li>
                        @endif
                    </ul>
                    <livewire:size-color :product="$product"/>
                    <ul class="pro__dtl__btn">
                        <li class="buy__now__btn"><a href="#">buy now</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Details -->
<!-- Start Product tab -->
<section class="htc__product__details__tab bg__white pb--120">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <ul class="product__deatils__tab mb--60" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#description" role="tab" data-toggle="tab">Description</a>
                    </li>
                    {{--
                    <li role="presentation">--}}
                        {{-- <a href="#sheet" role="tab" data-toggle="tab">Data sheet</a>--}}
                        {{--
                    </li>
                    --}}
                    <li role="presentation">
                        <a href="#reviews" role="tab" data-toggle="tab">Reviews</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product__details__tab__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="product__tab__content fade in active">
                        <div class="product__description__wrap">
                            <div class="product__desc">
                                <h2 class="title__6">Details</h2>
                                <p>{!! $product->description !!}</p>
                            </div>
                            {{--
                            <div class="pro__feature">--}}
                                {{-- <h2 class="title__6">Features</h2>--}}
                                {{--
                                <ul class="feature__list">--}}
                                    {{--
                                    <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Duis aute irure dolor in--}}
                                            {{-- reprehenderit in voluptate velit esse</a></li>
                                    --}}
                                    {{--
                                    <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Irure dolor in--}}
                                            {{-- reprehenderit in voluptate velit esse</a></li>
                                    --}}
                                    {{--
                                    <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Sed do eiusmod tempor--}}
                                            {{-- incididunt ut labore et </a></li>
                                    --}}
                                    {{--
                                    <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Nisi ut aliquip ex ea--}}
                                            {{-- commodo consequat.</a></li>
                                    --}}
                                    {{--
                                </ul>
                                --}}
                                {{--
                            </div>
                            --}}
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    {{--
                    <div role="tabpanel" id="sheet" class="product__tab__content fade">--}}
                        {{--
                        <div class="pro__feature">--}}
                            {{-- <h2 class="title__6">Data sheet</h2>--}}
                            {{--
                            <ul class="feature__list">--}}
                                {{--
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Duis aute irure dolor in--}}
                                        {{-- reprehenderit in voluptate velit esse</a></li>
                                --}}
                                {{--
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Irure dolor in reprehenderit in--}}
                                        {{-- voluptate velit esse</a></li>
                                --}}
                                {{--
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Irure dolor in reprehenderit in--}}
                                        {{-- voluptate velit esse</a></li>
                                --}}
                                {{--
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Sed do eiusmod tempor--}}
                                        {{-- incididunt ut labore et </a></li>
                                --}}
                                {{--
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Sed do eiusmod tempor--}}
                                        {{-- incididunt ut labore et </a></li>
                                --}}
                                {{--
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Nisi ut aliquip ex ea commodo--}}
                                        {{-- consequat.</a></li>
                                --}}
                                {{--
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Nisi ut aliquip ex ea commodo--}}
                                        {{-- consequat.</a></li>
                                --}}
                                {{--
                            </ul>
                            --}}
                            {{--
                        </div>
                        --}}
                        {{--
                    </div>
                    --}}
                    <!-- End Single Content -->
                    <!-- Start Single Content -->

                    <div role="tabpanel" id="reviews" class="product__tab__content fade">
                        <div class="review__address__inner">
                            @foreach($product->reviews as $user)
                            <!-- Start Single Review -->
                            <div class="pro__review">
                                <div class="review__thumb">
                                    {{-- <img src="" alt="review images">--}}
                                </div>
                                <div class="review__details">
                                    <div class="review__info">
                                        <h4><a href="#">{{$user->name}}</a></h4>
                                        <ul class="rating">
                                            @for($i = 1 ; $i <= $user->pivot->rate ; $i++)
                                            <li><i class="fas fa-star"></i></li>
                                            @endfor
                                            @for($i = 1 ; $i <= (5-$user->pivot->rate) ; $i++)
                                            <li><i class="far fa-star"></i></li>
                                            @endfor
                                        </ul>
                                        {{--
                                        <div class="rating__send">--}}
                                            {{-- <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>--}}
                                            {{-- <a href="#"><i class="zmdi zmdi-close"></i></a>--}}
                                            {{--
                                        </div>
                                        --}}
                                    </div>
                                    <div class="review__date">
                                        <span>{{\Carbon\Carbon::parse($user->pivot->created_at)->diffForHumans()}}</span>
                                    </div>
                                    <p>{{$user->pivot->comment}}</p>
                                </div>
                            </div>
                            @endforeach
                            <!-- End Single Review -->
                        </div>
                        <!-- Start RAting Area -->
                        <div class="rating__wrap">
                            <h2 class="rating-title">Write A review</h2>
                            <h4 class="rating-title-2">Your Rating</h4>
                            <div class="rating__list">
                                <!-- Start Single List -->
                                <ul class="rating">
                                    <li><i class="zmdi zmdi-star-half"></i></li>
                                </ul>
                                <!-- End Single List -->
                            </div>
                        </div>
                        <!-- End RAting Area -->
                        <div class="review__box">
                            <form id="review-form">
                                <div class="single-review-form">
                                    <div class="review-box message">
                                        <textarea placeholder="Write your review"></textarea>
                                    </div>
                                </div>
                                <div class="review-btn">
                                    <a class="fv-btn" href="#">submit review</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product tab -->
@endsection

@push('js')
@livewireScripts
@endpush
