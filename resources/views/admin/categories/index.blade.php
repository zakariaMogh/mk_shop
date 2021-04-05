@extends('admin.layouts.app')

@section('title', $title ?? 'Create category')

@section('content')
    <h2 class="mt-30 page-title">Catégories</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        @if(request()->is('admin/categories*'))
            <li class="breadcrumb-item active">Catégories</li>
        @else
            <li class="breadcrumb-item active">Sous-catégories</li>
        @endif

    </ol>
    <div class="row justify-content-between">

        <div class="col-lg-3 col-md-4">
            <div class="bulk-section mt-30">
                <div class="col-lg-12">
                    @if(request()->is('admin/categories*'))
                        <a href="{{route('admin.categories.create')}}" class="add-btn hover-btn">Ajouter une
                            catégorie</a>
                    @else
                        <a href="{{route('admin.categories.sub.create')}}" class="add-btn hover-btn">Ajouter une
                            sous-catégorie</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6">
            <div class="bulk-section mt-30">
                <form>
                    <div class="input-group">
                        <div class="input-group-append">
                            <div class="search-by-name-input">
                                <input type="text" class="form-control" placeholder="Nom de catégorie" name="q"
                                       value="{{request('q')}}">
                            </div>
                            <button class="status-btn hover-btn" type="submit">Rechercher</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card card-static-2 mt-30 mb-30">
                <div class="card-title-2">
                    <h4>Toutes catégories</h4>
                </div>
                <div class="card-body-table">
                    <div class="table-responsive">
                        @if(request()->is('admin/sub/categories*'))
                            <table class="table ucp-table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Nom</th>
                                    <th>Parent</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>
                                            <div class="cate-img">
                                                <img src="{{asset($category->image_url)}}" alt="">
                                            </div>
                                        </td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->parent->name}}</td>
                                        <td class="action-btns">
                                            <a href="{{route('admin.categories.sub.edit',$category->id)}}"
                                               class="edit-btn"><i class="fas fa-edit"></i>Éditer</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <table class="table ucp-table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Nom</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>
                                            <div class="cate-img">
                                                <img src="{{asset($category->image_url)}}" alt="">
                                            </div>
                                        </td>
                                        <td>{{$category->name}}</td>
                                        <td class="action-btns">
                                            <a href="{{route('admin.categories.edit',$category->id)}}" class="edit-btn"><i
                                                    class="fas fa-edit"></i>Éditer</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        <div class="d-flex justify-content-center">
                            {{$categories->onEachSide(1)->withQueryString()->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

