@extends('admin.layouts.app')

@section('title',$title ?? '')

@section('content')
    <h2 class="mt-30 page-title">Clients</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item active">Clients</li>
    </ol>
    @include('admin.layouts.partials.messages')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-static-2 mb-30">

                <div class="card-title-2">
                    <h4>Tous les clients</h4>
                </div>
                <div class="card-body-table">
                    <div class="col-lg-5 col-md-6">
                        <form>

                            <div class="bulk-section mt-30">
                                <div class="search-by-name-input">
                                    <input type="text" name="q" class="form-control" placeholder="Client"
                                           value="{{request()->get('q') ?? '' }}">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <button class="status-btn hover-btn" type="submit">Chercher</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-title-2">
                        <h4></h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table ucp-table table-hover">
                            <thead>
                            <tr>

                                <th style="width:60px">ID</th>
                                <th style="width:100px">Image</th>
                                <th>Utilisateur</th>
                                <th>Email</th>
                                <th>Numero de telephone</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)

                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>
                                        <div class="cate-img-6">
                                            <img src="{{asset($user->pic_url)}}" alt="">
                                        </div>
                                    </td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_1}}</td>
                                    <td class="action-btns">
                                        <a href="{{route('admin.users.show',$user->id)}}" class="view-shop-btn"
                                           title="View"><i class="fas fa-eye"></i></a>
                                        {{--                                    <a href="{{route('admin.users.edit',$user->id)}}" class="view-shop-btn" title="View"><i class="fas fa-edit"></i></a>--}}
{{--                                        <a href="javascript:void(0)" onclick="deleteRecord({{$user->id}})"--}}
{{--                                           class="delete-btn" title="delete"><i class="fas fa-trash-alt"></i></a>--}}
{{--                                        <form action="{{route('admin.users.destroy',$user->id)}}" method="post"--}}
{{--                                              id="delete-form-{{$user->id}}">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                        </form>--}}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center">
                            {{$users->onEachSide(1)->withQueryString()->links()}}
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
