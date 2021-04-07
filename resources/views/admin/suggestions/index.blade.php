@extends('admin.layouts.app')

@section('title',$title ?? '')

@section('content')
    <h2 class="mt-30 page-title">Suggestions</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item active">Suggestions</li>
    </ol>
    @include('admin.layouts.partials.messages')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-static-2 mb-30">

                <div class="card-title-2">
                    <h4>Tous les suggestions</h4>
                </div>
                <div class="card-body-table">

                    <div class="card-title-2">
                        <h4></h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table ucp-table table-hover">
                            <thead>
                            <tr>

                                <th style="width:60px">ID</th>
                                <th style="width:120px">Email</th>
                                <th style="width:120px">Sujet</th>
                                <th style="width:300px">Contenue</th>
                                <th style="width:60px">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($suggestions as $suggestion)

                                <tr>
                                    <td>{{$suggestion->id}}</td>
                                    <td>{{$suggestion->email}}</td>
                                    <td>{{$suggestion->subject}}</td>
                                    <td>{{$suggestion->content}}</td>
                                    <td class="action-btns">
{{--                                        <a href="{{route('admin.suggestions.show',$suggestion->id)}}" class="view-shop-btn"--}}
{{--                                           title="View"><i class="fas fa-eye"></i></a>--}}
                                        {{--                                    <a href="{{route('admin.suggestions.edit',$suggestion->id)}}" class="view-shop-btn" title="View"><i class="fas fa-edit"></i></a>--}}
                                        <form action="{{route('admin.suggestions.destroy', $suggestion->id)}}" method="post"
                                              id="delete-suggestion-form">
                                            @csrf
                                            @method('delete')
                                            <button class="delete-btn btn p-0" onclick="return confirm('Voulez vous vraiment supprimer cette suggestion')"
                                                    id="delete-suggestion">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center">
                            {{$suggestions->onEachSide(1)->withQueryString()->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const deleteRecord = id => {
            let deleteForm = document.getElementById(`delete-form-${id}`)
            confirm('Delete confirmation ?') && deleteForm.submit();
        }
    </script>
@endpush
