@extends('admin.layouts.app')

@section('title', $title ?? 'Admin Dashboard')

@section('content')

    <h2 class="mt-30 page-title">Tableau de bord</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item active">Tableau de bord</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-report-card purple">
                <div class="card-content">
                    <span class="card-title">EN ATTENTE</span>
                    <span class="card-count">{{$pending}}</span>
                </div>
                <div class="card-media">
                    <i class="fab fa-rev"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-report-card red">
                <div class="card-content">
                    <span class="card-title">ANNULÉE</span>
                    <span class="card-count">{{$canceled}}</span>
                </div>
                <div class="card-media">
                    <i class="far fa-times-circle"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-report-card info">
                <div class="card-content">
                    <span class="card-title">EN TRAITEMENT</span>
                    <span class="card-count">{{$processing}}</span>
                </div>
                <div class="card-media">
                    <i class="fas fa-sync-alt rpt_icon"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-report-card success">
                <div class="card-content">
                    <span class="card-title">CLIENTS</span>
                    <span class="card-count">{{$users}}</span>
                </div>
                <div class="card-media">
                    <i class="fas fa-users rpt_icon"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-md-12">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Dernières commandes</h4>
                    <a href="{{route('admin.orders.index')}}" class="view-btn hover-btn">Consulter tout</a>
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
                            @foreach($orders as $o)
                                <tr>
                                    <td>{{$o->id}}</td>
                                    <td>
                                        <a target="_blank">{{$o->name}}</a>
                                    </td>
                                    <td>
                                        <span class="delivery-time">{{$o->shipping_date->format('d/m/Y')}}</span>
                                        {{--                                    <span class="delivery-time">4:00PM - 6.00PM</span>--}}
                                    </td>
                                    <td>{{$o->address}}</td>
                                    <td>
                                        @if($o->state === 'pending')
                                            <span class="badge-item badge-status">EN ATTENTE</span>
                                        @endif
                                        @if($o->state === 'canceled')
                                            <span class="badge-item badge-status">ANNULÉE</span>
                                        @endif
                                        @if($o->state === 'processing')
                                            <span class="badge-item badge-status">EN TRAITEMENT</span>
                                        @endif
                                        @if($o->state === 'validated')
                                            <span class="badge-item badge-status">VALIDÉ</span>
                                        @endif

                                    </td>
                                    <td>{{$o->total}} DZD</td>
                                    <td class="action-btns">
                                        <a href="{{route('admin.orders.show',$o->id)}}" class="views-btn"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('admin.orders.edit',$o->id)}}" class="edit-btn"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('admin.orders.invoice.print',$o->id)}}" class="print-btn"><i class="fas fa-print"></i></a>

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
