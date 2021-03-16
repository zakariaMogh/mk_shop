@extends('admin.layouts.app')

@section('title,Admin Panel',$order->id)

@section('content')

    <h2 class="mt-30 page-title">Commandes</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.orders.index')}}">Commandes</a></li>
        <li class="breadcrumb-item active">Modifier facture</li>
    </ol>
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h2 class="title1458">Facture</h2>
                    <span class="order-id">N°: 000{{$order->id}}</span>
                </div>
                <div class="invoice-content">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="ordr-date">
                                <b>Le:</b> 29-05-2020
                            </div>
                            <div class="ordr-date">
                                <b>Adress :</b>119 Ter Rue Didouche Mourad, <br>
                                Alger center<br>
                                Alger<br>
                                <b>Tel :</b>+213 558 547 879<br>
                                <b>Email :</b>email@gmail.com<br>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="ordr-date right-text">
                                <b>Client :</b><br>
                                {{$order->name}}<br>
                                {{$order->address}},<br>
                                {{$order->province}},<br>
                                {{$order->wilaya}}<br>
                                {{$order->phone}}<br>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card card-static-2 mb-30 mt-30">
                                <div class="card-title-2">
                                    <h4>Achats</h4>
                                </div>
                                <div class="card-body-table">
                                    <div class="table-responsive">
                                        <table class="table ucp-table table-hover">
                                            <thead>
                                            <tr>
                                                <th style="width:130px">#</th>
                                                <th>Produits</th>
                                                <th style="width:150px" class="text-center">Prix</th>
                                                <th style="width:150px" class="text-center">Qte</th>
                                                <th style="width:100px" class="text-center">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->products as $p)
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <a href="{{$p->path()}}" target="_blank">{{$p->name}}</a>
                                                    </td>
                                                    <td class="text-center">{{$p->price}} DZD</td>
                                                    <td class="text-center">{{$p->pivot->qte}}</td>
                                                    <td class="text-center">{{$p->price * $p->pivot->qte}} DZD</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7"></div>
                        <div class="col-lg-5">
                            <div class="order-total-dt">
                                <div class="order-total-left-text">
                                    Sous-total
                                </div>
                                <div class="order-total-right-text">
                                    {{$order->sub_total}} DZD
                                </div>
                            </div>
                            <div class="order-total-dt">
                                <div class="order-total-left-text">
                                    Frais de livraison
                                </div>
                                <div class="order-total-right-text">
                                    {{$order->shipping}} DZD
                                </div>
                            </div>
                            @if($order->paymentmethod === 'card')
                                <div class="order-total-dt">
                                    <div class="order-total-left-text">
                                        Remise
                                    </div>
                                    <div class="order-total-right-text">
                                        {{$order->points}} DZD
                                    </div>
                                </div>
                            @endif
                            <div class="order-total-dt">
                                <div class="order-total-left-text fsz-18">
                                    Montant total
                                </div>
                                <div class="order-total-right-text fsz-18">
                                    {{$order->total}} DZD
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7"></div>
                        <div class="col-lg-5">
                            <form action="{{route('admin.orders.update',$order->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="select-status">
                                    <label for="status">Status*</label>
                                    <div class="input-group">
                                        <select id="status" name="state" class="custom-select ">
                                            <option value="pending" {{$order->state === 'pending' ? 'selected' : ''}}>En attente</option>
                                            <option value="processing" {{$order->state === 'processing' ? 'selected' : ''}}>En traitement</option>
                                            <option value="validated" {{$order->state === 'validated' ? 'selected' : ''}}>Validée</option>
                                            <option value="canceled" {{$order->state === 'canceled' ? 'selected' : ''}}>Annulée</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="status-btn hover-btn" type="submit">Appliquer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
