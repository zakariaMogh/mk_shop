@extends('front.layouts.app')

@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
         style="background: rgba(0, 0, 0, 0) url({{asset('front-assets/images/bg/2.png')}}) ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Commandes</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{route('home')}}">Accuile</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Commandes</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->

    <div class="ht__bradcaump__area " style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg)  scroll center center / cover ;padding:50px 0 ; ">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h5 class="bradcaump-title ">{{auth()->user()->name}}</h5>
                            <div class="breadcrumb-item ">{{auth()->user()->email}}</div>
                            <div class="blog__details__btn">
                                <a class="htc__btn btn--gray" href="{{route('profile.index')}}">Modifier mon profil</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="htc__product__area shop__page ptb--60 bg__white">
        <div class="container">
            <h6 class="bradcaump-title " style="margin-bottom:50px;">Les commands</h6>

            <div class="htc__product__container " >
                <!-- Start Product MEnu -->
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-md-12">
                        <div class="filter__menu__container">
                            <div class="product__menu">
                                <a   href="{{route('order.index')}}" class="btn btn-lg"
                                    {{!request()->has('state') ? 'style=color:#f19199' : ''}}>All</a>
                                <a href="{{route('order.index', ['state' => 'validated'])}}" class="btn btn-lg"
                                    {{request()->get('state') == 'validated' ? 'style=color:#f19199' : ''}}>Terminer </a>
                                <a href="{{route('order.index', ['state' => 'pending'])}}" class="btn btn-lg"
                                    {{request()->get('state') == 'pending' ? 'style=color:#f19199' : ''}}>En attente </a>
                                <a href="{{route('order.index', ['state' => 'processing'])}}" class="btn btn-lg"
                                    {{request()->get('state') == 'processing' ? 'style=color:#f19199' : ''}}>En cours </a>
                                <a href="{{route('order.index', ['state' => 'canceled'])}}" class="btn btn-lg"
                                    {{request()->get('state') == 'canceled' ? 'style=color:#f19199' : ''}}>Annuler </a>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Product MEnu -->
                <div class="row">
                    <div class="product__list another-product-style">
                        <!-- Start Single Product -->
                        @foreach($orders as $order)
                        <div class="col-md-3 single__pro col-lg-4  col-sm-4 col-xs-12   cat--2" style=" box-shadow: 3px 3px 16px rgb(243, 243, 243), -3px -3px 16px rgb(243, 243, 243);padding:20px;">

                            <div class="card ">
                                <div class="card-body">
                                    <span class="lead">La commande: <strong > {{$order->id}}</strong></span>
                                    <ul class="details">
                                        <li class=" text-muted">{{$order->created_at->format('d-m-Y h:i')}} </li>
                                        <li><strong > Par :</strong>  {{auth()->user()->name}}</li>
                                        <li style="height: 70px;overflow: hidden!important;"><strong > adresse :</strong>   {{$order->wilaya}}, {{$order->province}}, {{$order->address}}</li>

                                    </ul>
                                    <br>
                                    <table class="table">
                                        <tr><td>Sous-total </td><td ></td><td class="text-center ">{{$order->sub_total > $order->cashback_sum ? $order->cashback_sum : $order->sub_total}}DA </td></tr>
                                        <tr><td>Livraison</td><td ></td><td class="text-center">{{$order->shipping}}DA </td></tr>
                                        <tr><td>Prix Total</td><td ></td><td class="text-center">{{($order->sub_total > $order->cashback_sum ? $order->cashback_sum : $order->sub_total) + $order->shipping}} </td></tr>
                                    </table>
                                    <span>Etat : </span>

                                    @switch($order->state)
                                        @case('pending')
                                        <span class="label label-warning badge-pill">En attente  </span>
                                        @break

                                        @case('processing')
                                        <span class="label label-warning badge-pill">En cours  </span>
                                        @break

                                        @case('canceled')
                                        <span class="label label-danger badge-pill">Annuler </span>
                                        @break

                                        @case('validated')
                                        <span class="label label-success badge-pill">Terminer</span>
                                        @break

                                        @default
                                        <span class="label label-warning badge-pill">En attente  </span>

                                    @endswitch

                                </div>
                            </div>

                        </div>
                    @endforeach
                        <!-- End Single Product -->


                    </div>
                </div>
                <div class="row mt--60">
                    <div class="col-12" style="text-align: center">
                        {{$orders->onEachSide(1)->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
