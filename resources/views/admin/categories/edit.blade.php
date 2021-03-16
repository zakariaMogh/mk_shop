@extends('admin.layouts.app')

@section('title', $title ?? 'Edit category')

@section('content')
    <h2 class="mt-30 page-title">Categories</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        @if(\Illuminate\Support\Str::contains(request()->path(),'sub'))
            <li class="breadcrumb-item"><a href="{{route('admin.categories.sub.index')}}">Sous-Categories</a></li>
            <li class="breadcrumb-item active">Modifier  sous-catégorie</li>
        @else
            <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Categories</a></li>
            <li class="breadcrumb-item active">Modifier catégorie</li>
        @endif
    </ol>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Modifier catégorie</h4>
                </div>
                @include('admin.layouts.partials.messages')
                <div class="card-body-table">
                    <form action="{{route('admin.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="news-content-right pd-20">
                            @include('admin.categories.form')
                            <button class="save-btn hover-btn" type="submit">Modifier</button>
                            @if(\Illuminate\Support\Str::contains(request()->path(),'sub'))
                                <button class="save-btn hover-btn" onclick="deleteSubmit('delete this category? you will not be able to recover it')" type="button">Supprimer</button>
                            @else
                                <button class="save-btn btn-danger hover-btn" onclick="deleteSubmit('delete this category?be careful, all subcategories to this category will be deleted automatically and you will not be able to recover them ')" type="button">Supprimer</button>
                            @endif                        </div>
                    </form>
                    <form id="categoryDeleteForm" action="{{route('admin.categories.destroy',$category->id)}}" method="post" >
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

    <script type="text/javascript" >
        let image = document.querySelector('#imagePreview');
        let input = document.querySelector('#inputGroupFile04')

        input.addEventListener('change',event => {
            image.src = URL.createObjectURL(event.target.files[0])
            image.onload = () => {
                URL.revokeObjectURL(image.src) // free memory
            }
        })
        const deleteSubmit = (message) => {
            let deleteForm = document.getElementById(`categoryDeleteForm`)
            confirm(message) && deleteForm.submit();
        }

    </script>

@endpush
