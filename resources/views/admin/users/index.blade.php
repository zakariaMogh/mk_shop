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
                                    <input type="text" name="q" class="form-control" placeholder="ID client">
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
                                <th style="width:60px"><input type="checkbox" class="check-all"></th>
                                <th style="width:60px">ID</th>
                                <th style="width:100px">Image</th>
                                <th>Utilisateur</th>
                                <th style="width:100px">Points</th>
                                <th style="width:100px">Achats</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)

                                <tr>
                                <td><input type="checkbox" class="check-item" name="ids[]" value="10"></td>
                                <td>{{$user->id}}</td>
                                <td>
                                    <div class="cate-img-6">
                                        <img src="{{asset('AdminAssets/assets/images/avatar/img-1.jpg')}}" alt="">
                                    </div>
                                </td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->cash}}</td>
                                <td>{{$user->transactions}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->status ? 'active' : 'inactive'}}</td>
                                <td class="action-btns">
                                    <a href="{{route('admin.users.show',$user->id)}}" class="view-shop-btn" title="View"><i class="fas fa-eye"></i></a>
{{--                                    <a href="{{route('admin.users.edit',$user->id)}}" class="view-shop-btn" title="View"><i class="fas fa-edit"></i></a>--}}
                                    <a href="javascript:void(0)" onclick="deleteRecord({{$user->id}})" class="delete-btn" title="delete"><i class="fas fa-trash-alt"></i></a>
                                    <form action="{{route('admin.users.destroy',$user->id)}}" method="post" id="delete-form-{{$user->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
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
