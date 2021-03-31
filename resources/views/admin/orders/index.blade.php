@extends('admin.layouts.app')

@section('title,Admin Panel','Orders')

@section('content')
    <h2 class="mt-30 page-title">Commandes</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item active">Commandes</li>
    </ol>
    <div class="row justify-content-between">
        <div class="col-lg-3 col-md-4">
            <div class="bulk-section mb-30">
                <div class="input-group">
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6">
            <form action="">

            <div class="bulk-section mb-30">
                <div class="search-by-name-input">
                    <input type="text" name="order_search" class="form-control" value="{{request('order_search')}}" placeholder="Client..">
                </div>
                <div class="input-group">

                    <select id="action" name="state" class="form-control">
                        <option value="all">Actions</option>
                        <option value="pending" {{request('state') === 'pending' ? 'selected' : ''}}>En attente</option>
                        <option value="processing" {{request('state') === 'processing' ? 'selected' : ''}}>En traitement</option>
                        <option value="validated" {{request('state') === 'validated' ? 'selected' : ''}}>Validée</option>
                        <option value="canceled" {{request('state') === 'canceled' ? 'selected' : ''}}>Annulée</option>
                    </select>
                    <div class="input-group-append">
                        <button class="status-btn hover-btn" type="submit">Rechercher</button>
                    </div>
                </div>
            </div>
            </form>

        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Tous les commandes</h4>
                </div>
                <div class="card-body-table">
                    <div class="table-responsive">
                        <table class="table ucp-table table-hover">
                            <thead>
                            <tr>
                                <th style="width:130px">ID</th>
                                <th>Client</th>
                                <th style="width:150px">Date</th>
                                <th style="width:300px">Address</th>
                                <th style="width:130px">Status</th>
                                <th style="width:130px">Total</th>
                                <th style="width:100px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>
                                    <a target="_blank">{{$order->name}}</a>
                                </td>
                                <td>
                                    <span class="delivery-time">{{$order->created_at->format('d/m/Y')}}</span>
{{--                                    <span class="delivery-time">4:00PM - 6.00PM</span>--}}
                                </td>
                                <td>{{$order->address}}</td>
                                <td>
                                    @if($order->state === 'pending')
                                        <span class="badge-item badge-status">EN ATTENTE</span>
                                    @endif
                                        @if($order->state === 'canceled')
                                            <span class="badge-item badge-status">ANNULÉE</span>
                                        @endif
                                        @if($order->state === 'processing')
                                            <span class="badge-item badge-status">EN TRAITEMENT</span>
                                        @endif
                                        @if($order->state === 'validated')
                                            <span class="badge-item badge-status">VALIDÉ</span>
                                        @endif

                                </td>
                                <td>{{$order->total}} DZD</td>
                                <td class="action-btns">
                                    <a href="{{route('admin.orders.show',$order->id)}}" class="views-btn"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('admin.orders.edit',$order->id)}}" class="edit-btn"><i class="fas fa-edit"></i></a>
{{--                                    <a href="{{route('admin.orders.invoice.print',$o->id)}}" class="print-btn"><i class="fas fa-print"></i></a>--}}

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
