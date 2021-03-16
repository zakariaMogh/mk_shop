@extends('admin.layouts.app')

@section('title',$product->name)

@section('content')

    <h2 class="mt-30 page-title">Produits</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">Produits</a></li>
        <li class="breadcrumb-item active">Consulter produit</li>
    </ol>
    <div class="row">
        <div class="col-lg-5 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-body-table">
                    <div class="shopowner-content-left text-center pd-20">
                        <div class="shop_img">
                            <img src="{{$product->image_url}}" alt="">
                        </div>
                        <div class="shopowner-dts">
                            <div class="shopowner-dt-list">
                                <span class="left-dt">ID</span>
                                <span class="right-dt">{{$product->id}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Produit</span>
                                <span class="right-dt">{{$product->name}}</span>
                            </div>

                            <div class="shopowner-dt-list">
                                <span class="left-dt">Prix</span>
                                <span class="right-dt">{{$product->price}} DZD</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Cash-back</span>
                                <span class="right-dt">{{$product->cashback}}%</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Couleur</span>
                                <span class="right-dt">{{$product->color}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Marque</span>
                                <span class="right-dt">{{$product->brand}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Qualité</span>
                                <span class="right-dt">{{$product->quality}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Description</span>
                                <br>
                                <div >
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
