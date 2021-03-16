@extends('admin.layouts.app')

@section('content')
    <h2 class="mt-30 page-title">Publicité</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.banners.index')}}">Publicité</a></li>
        <li class="breadcrumb-item active">Ajouter une publicité</li>
    </ol>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Ajouter une nouvelle publicité</h4>
                </div>
                @include('admin.layouts.partials.messages')

                <div class="card-body-table">
                    <form action="{{route('admin.banners.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="news-content-right pd-20">
                            @include('admin.banners.form')
                            <button class="save-btn hover-btn" type="submit">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            // preview image function
            const readURL = (input,id) =>{
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#pic").change(function() {
                readURL(this,'pic_preview');
            });
        </script>
    @endpush
@endsection
