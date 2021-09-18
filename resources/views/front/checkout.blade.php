@extends('front.layouts.app')

@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
         style="background: rgba(0, 0, 0, 0) url({{asset('front-assets/images/bg/2.png')}});">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Finalisation</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{route('home')}}">Accueille</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Finalisation</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Checkout Area -->
    <section class="our-checkout-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="ckeckout-left-sidebar">
                        <!-- Start Checkbox Area -->
                        <form class="checkout-form" method="post" action="{{route('checkout.store')}}" id="checkout-form">
                            @csrf
                            <h2 class="section-title-3">Details</h2>
                            @include('front.layouts.partials.messages')
                            @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger small">*{{ $error }}</li>
                                        @endforeach
                                    </ul>
                            @endif
                            <div class="checkout-form-inner">
                                <div class="single-checkout-box">
                                    <input type="text" placeholder="Nom*" name="name" value="{{old('name')}}">

                                    <input type="text" placeholder="téléphone*" name="phone" value="{{old('phone')}}">

                                </div>
                                <div class="single-checkout-box select-option">
                                    <select name="delivery">
                                        <option>Livraison*</option>
                                        @foreach($deliveries as $delivery)
                                            <option value="{{$delivery->id}}" {{old('delivery') == $delivery->id ? 'selected' : ''}}>{{$delivery->location}}</option>
                                        @endforeach
                                    </select>

                                    <input type="text" placeholder="Bladiya*" name="province" value="{{old('province')}}">

                                </div>
                                <div class="single-checkout-box">
                                    <select name="type">
                                        <option>Type de livraison*</option>
                                        <option value="domicile" {{old('type') == 'domicile' ? 'selected' : ''}}>A domicile</option>
                                        <option value="bureau" {{old('type') == 'bureau' ? 'selected' : ''}}>Au bureau</option>
                                    </select>
                                    <input type="text" placeholder="Adresse*" name="address" value="{{old('address')}}">

                                </div>
                            </div>
                        </form>
                        <div class="our-payment-sestem">
                            <div class="checkout-btn text-right">
                                <a class="ts-btn btn-light btn-large hover-theme" href="javascript:void(0)" onclick="submit()">Confirmer</a>
                            </div>
                        </div>
                        <!-- End Payment Way -->
                    </div>
                </div>
{{--                <div class="col-md-4 col-lg-4">--}}
{{--                    <div class="checkout-right-sidebar">--}}
{{--                        <div class="our-important-note">--}}
{{--                            <h2 class="section-title-3">Note :</h2>--}}
{{--                            <p class="note-desc">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod--}}
{{--                                tempor incididunt ut laborekf et dolore magna aliqua.</p>--}}
{{--                            <ul class="important-note">--}}
{{--                                <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet,--}}
{{--                                        consectetur nipabali</a></li>--}}
{{--                                <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit--}}
{{--                                        amet</a></li>--}}
{{--                                <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet,--}}
{{--                                        consectetur nipabali</a></li>--}}
{{--                                <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet,--}}
{{--                                        consectetur nipabali</a></li>--}}
{{--                                <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit--}}
{{--                                        amet</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="puick-contact-area mt--60">--}}
{{--                            <h2 class="section-title-3">Quick Contract</h2>--}}
{{--                            <a href="phone:+8801722889963">+012 345 678 102 </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!-- End Checkout Area -->
@endsection
@push('js')
    <script>
        function submit()
        {
            $('#checkout-form').submit()
        }
    </script>
@endpush
