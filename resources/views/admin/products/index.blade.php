@extends('admin.layouts.app')

@section('title','Products')

@section('content')

    <h2 class="mt-30 page-title">Produits</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item active">Produits</li>
    </ol>
    @include('admin.layouts.partials.messages')

    <div class="row justify-content-between">

        <div class="col-lg-12">
            <a href="{{route('admin.products.create')}}" class="add-btn hover-btn">Ajouter produit</a>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="bulk-section mt-30">

            </div>
        </div>
        <div class="col-lg-5 col-md-6">
            <form method="GET">
                <div class="bulk-section mt-30">
                    <div class="search-by-name-input">
                        <input type="text" name="q" value="{{request('q')}}" class="form-control" placeholder="Chercher...">
                    </div>
                    <div class="input-group">
                        <select id="state" name="state" class="form-control">
                            <option {{request('state') === 'active' ? 'selected' :''}} value="active">Active</option>
                            <option value="inactive" {{request('state') === 'inactive' ? 'selected' :''}}>Inactive</option>
{{--                            <option value="qte" {{request('state') === 'qte' ? 'selected' :''}}>Qte</option>--}}
                            <option value="all" {{request('state') === 'all' ? 'selected' :''}}>All</option>
                        </select>
                        <div class="input-group-append">
                            <button class="status-btn hover-btn" type="submit">Chercher produit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card card-static-2 mt-30 mb-30">
                <div class="card-title-2">
                    <h4>Tous les produits</h4>
                </div>
                <div class="card-body-table">
                    <div class="table-responsive">
                        <table class="table ucp-table table-hover">
                            <thead>
                            <tr>
{{--                                <th style="width:60px"><input type="checkbox" class="check-all"></th>--}}
                                <th style="width:60px">ID</th>
                                <th style="width:100px">Image</th>
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Sous-catégorie</th>
                                <th>Prix</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            <form id="deleteForm" action="{{route('admin.products.multiple.destroy')}}" method="post">--}}
{{--                                @csrf--}}
                            @foreach($products as $product)
                            <tr>
{{--                                <td><input type="checkbox" class="check-item action-check" name="ids[]" value="{{$product->id}}"></td>--}}
                                <td>{{$product->id}}</td>
                                <td>
                                    <div class="cate-img-5">
                                        <img src="{{isset($product->images[0]) ? $product->images[0]->image_url : ''}}" alt="">
                                    </div>
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{isset($product->categories) && $product->categories->count() > 0 ? $product->categories->where('parent_id','=',null)->first()->name : '/'}}</td>
                                <td>{{isset($product->categories) && $product->categories->count() > 0 ? $product->categories->where('parent_id','!=',null)->first()->name : '/'}}</td>
                                <td>{{$product->price}} DZD</td>
                                <td><span class="badge-item badge-status">{{$product->state}}</span></td>
                                <td class="action-btns">
                                    <a href="{{route('admin.products.show',$product->id)}}" class="view-shop-btn" title="View"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('admin.products.edit',$product->id)}}" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>

                                    <form action="{{route('admin.products.destroy', $product->id)}}" method="post"
                                          id="delete-product-form">
                                        @csrf
                                        @method('delete')
                                        <button class="delete-btn btn p-0" onclick="return confirm('Voulez vous vraiment supprimer ce produit')"
                                                id="delete-product">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
{{--                            </form>--}}

                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{$products->onEachSide(1)->withQueryString()->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

{{--    <script>--}}
{{--        const deleteRecord = () => {--}}
{{--            let action = document.querySelector('#action')--}}
{{--            if (action.value === 'delete')--}}
{{--            {--}}
{{--                let ids = [];--}}
{{--                let inputs  = document.getElementsByClassName('action-check');--}}
{{--                for (let i = 0; i < inputs.length ;i++ )--}}
{{--                {--}}
{{--                    if (inputs[i].checked){--}}
{{--                        ids.push(inputs[i].value)--}}
{{--                    }--}}
{{--                }--}}
{{--                if (ids.length > 0)--}}
{{--                {--}}
{{--                    let deleteForm = document.getElementById('deleteForm')--}}
{{--                    confirm('Delete confirmation') && deleteForm.submit()--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}

@endpush
