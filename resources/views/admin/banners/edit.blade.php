@extends('admin.layouts.app')

@section('content')
    <h2 class="mt-30 page-title">Pblicités</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.banners.index')}}">Publicités</a></li>
        <li class="breadcrumb-item active">Modifier une publicité</li>
    </ol>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Modifier une publicité</h4>
                </div>
                @include('admin.layouts.partials.messages')
                <div class="card-body-table">
                    <form action="{{route('admin.banners.update', $banner->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="news-content-right pd-20">
                            @include('admin.banners.form')
                            <button class="save-btn hover-btn" type="submit">Modifier</button>
                            <button class="save-btn hover-btn" type="submit" form="delete-category">Supprimer image
                            </button>
                        </div>
                    </form>
                    <form action="{{route('admin.banners.destroy',$banner->id)}}" id="delete-category"
                          method="post">
                        @method('delete')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            // preview image function
            const readURL = (input, id) => {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $('#preview').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#pic").change(function () {
                readURL(this, 'pic_preview');
            });
        </script>
    @endpush
@endsection

