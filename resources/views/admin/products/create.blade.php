@extends('admin.layouts.app')

@section('title','Create Product')


@section('content')

    <h2 class="mt-30 page-title">Produits</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">Produit</a></li>
        <li class="breadcrumb-item active">Ajouter un Produit</li>
    </ol>

    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Ajouter un nouveau produit</h4>
                </div>
                @include('admin.layouts.partials.messages')

                <div class="card-body-table">
                    <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="news-content-right pd-20">
                            @include('admin.products.form')
                            <button class="save-btn hover-btn" type="submit">Ajouter</button>
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
        // showing category bu parent_id
        //
        // let subCatToHide = [];
        //
        // const parentChange =  () => {
        //     subCatToHide.forEach((value) => {
        //         value.style.display = 'none';
        //     })
        //     let parentSelected = document.querySelector('#parent').value;
        //     let subCatToShow  = document.querySelectorAll(`.sub-cate-to-${parentSelected}`)
        //     subCatToShow.forEach((value) => {
        //         value.style.display = '';
        //     })
        //
        // }

        input.addEventListener('change',event => {
            image.src = URL.createObjectURL(event.target.files[0])
            image.onload = () => {
                URL.revokeObjectURL(image.src) // free memory
            }
        });

    </script>
@endpush
