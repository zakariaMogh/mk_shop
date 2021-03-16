@extends('admin.layouts.app')

@section('content')
    <h2 class="mt-30 page-title">Publicités</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item active">Publicités</li>
    </ol>
    @include('admin.layouts.partials.messages')
    <div class="row justify-content-between">

        <div class="col-lg-3 col-md-4">
            <div class="bulk-section mt-30">
                <div class="col-lg-12">
                    <a href="{{route('admin.banners.create')}}" class="add-btn hover-btn">Ajouter une
                        publicité</a>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6">
            <div class="bulk-section mt-30">

                {{--                <div class="input-group">--}}
                {{--                    <form action="" method="get">--}}
                {{--                        <div class="input-group-append">--}}
                {{--                            @include('admin.layouts.partials.searchBar')--}}
                {{--                            <button class="status-btn hover-btn" type="submit">Rechercher</button>--}}
                {{--                        </div>--}}
                {{--                    </form>--}}
                {{--                </div>--}}
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card card-static-2 mt-30 mb-30">
                <div class="card-title-2">
                    <h4>Toutes les publicité</h4>
                </div>
                <div class="card-body-table">
                    <div class="table-responsive">
                        <table class="table ucp-table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Lien</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <td>{{$banner->id}}</td>
                                    <td>
                                        <div class="cate-img-5">
                                            <img src="{{asset('storage/'.$banner->image)}}" alt="">
                                        </div>
                                    </td>
                                    <td>{{$banner->title}}</td>
                                    <td>{{$banner->link}}</td>
                                    <td class="action-btns">
                                        <a href="{{route('admin.banners.edit', $banner->id)}}"
                                           class="edit-btn"><i class="fas fa-edit"></i></a>
                                        {{--                                        <form action="{{route('admin.images.visibility', $image->id)}}" method="post"--}}
                                        {{--                                              id="delete-product-form">--}}
                                        {{--                                            @csrf--}}
                                        {{--                                            <button class="delete-btn btn p-0" onclick="return confirm('Voulez vous vraiment effectuez cette action ?')">--}}
                                        {{--                                                <i class="fas fa-eye"></i>--}}
                                        {{--                                            </button>--}}
                                        {{--                                        </form>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$banners->onEachSide(1)->withQueryString()->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
