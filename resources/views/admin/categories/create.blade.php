@extends('admin.layouts.app')

@section('title', $title ?? 'Create category')

@section('content')

    <h2 class="mt-30 page-title">Categories</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        @if(\Illuminate\Support\Str::contains(request()->path(),'sub'))
            <li class="breadcrumb-item"><a href="{{route('admin.categories.sub.index')}}">Sous-Categories</a></li>
            <li class="breadcrumb-item active">Ajouter une  sous-catégorie</li>
        @else
            <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Categories</a></li>
            <li class="breadcrumb-item active">Ajouter une catégorie</li>
        @endif
    </ol>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Ajouter une nouvelle catégorie</h4>
                </div>
                <div class="card-body-table">
                    <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="news-content-right pd-20">
                            @include('admin.categories.form')
                            <button class="save-btn hover-btn" type="submit">Ajouter</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
