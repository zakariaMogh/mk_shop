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
                            <h2 class="bradcaump-title">Panier</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{route('home')}}">Accueille</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Panier</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- cart-main-area start -->

    <livewire:cart :cart="$cart"/>
    <!-- cart-main-area end -->
@endsection

@push('js')
    @livewireScripts
@endpush
