@extends('admin.layouts.app')

@section('title','Edit Product '.$product->name)

@section('content')

    <h2 class="mt-30 page-title">Produits</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">Produit</a></li>
        <li class="breadcrumb-item active">Modifier produit</li>
    </ol>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Modifier produit</h4>
                </div>
                @include('admin.layouts.partials.messages')

                <div class="card-body-table">
                    <form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="news-content-right pd-20">
                            @include('admin.products.form')
                            <button class="save-btn hover-btn" type="submit">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

    <script type="text/javascript" defer>
        let image = document.querySelector('#imagePreview');
        let input = document.querySelector('#inputGroupFile04')

        input.addEventListener('change',event => {
            image.src = URL.createObjectURL(event.target.files[0])
            image.onload = () => {
                URL.revokeObjectURL(image.src) // free memory
            }
        });

    </script>
@endpush
