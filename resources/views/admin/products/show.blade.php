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
                                <span class="left-dt">Prix aprer promotion</span>
                                <span class="right-dt">{{$product->cashback}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Tailles</span>
                                <span class="right-dt">
                                    @foreach($product->sizes as $size)
                                        {{$size->size}} @if(!$loop->last) / @endif
                                    @endforeach
                                </span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Couleur</span>
                                <span class="right-dt d-flex">
                                    @foreach($product->sizes as $size)
                                        @foreach($size->colors as $color)
                                            <div class="form-control" style="background-color:  #{{$color->color}}">
                                            </div>

                                        @endforeach
                                    @endforeach
                                </span>
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
        <div class="col-lg-7 col-md-6">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($product->images as $image)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img class="d-block w-100" src="{{asset($image->image_url)}}" alt="First slide">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card card-static-2 mt-30 mb-30">
                <div class="card-title-2">
                    <h4>Tous les commentaires</h4>
                </div>
                @include('admin.layouts.partials.messages')
                <div class="card-body-table">
                    <div class="table-responsive">
                        <table class="table ucp-table table-hover">
                            <thead>
                            <tr>
                                <th style="width:60px">ID</th>
                                <th>Client</th>
                                <th>Note</th>
                                <th>Commentaire</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--                            <form id="deleteForm" action="{{route('admin.products.multiple.destroy')}}" method="post">--}}
                            {{--                                @csrf--}}
                            @foreach($reviews as $review)
                                <tr>
                                    {{--                                <td><input type="checkbox" class="check-item action-check" name="ids[]" value="{{$product->id}}"></td>--}}
                                    <td>{{$review->pivot->id}}</td>
                                    <td>{{$review->username}}</td>
                                    <td>{{$review->pivot->rate}} / 5</td>
                                    <td>{{$review->pivot->comment}}</td>
                                    <td class="action-btns">
                                        <form action="{{route('admin.reviews.destroy', $review->pivot->id)}}" method="post"
                                              id="delete-review-form">
                                            @csrf
                                            @method('delete')
                                            <button class="delete-btn btn p-0" onclick="return confirm('Voulez vous vraiment supprimer ce commentaire')"
                                                    id="delete-review">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{--                            </form>--}}

                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{$reviews->onEachSide(1)->withQueryString()->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
