<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description-gambolthemes" content="">
    <meta name="author-gambolthemes" content="">
    <title>Mk_shop invoice</title>
    <link href="{{asset('admin-assets/css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/css/admin-style.css')}}" rel="stylesheet">

    <!-- Vendor Stylesheets -->
    <link href="{{asset('admin-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
<header class="header clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-header-group">
                    <div class="top-header">
                        <div class="header_right">
                            <a href="#" class="report-btn hover-btn printPage">Imprimer facture</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card card-static-2 mb-30">
                    <div class="card-title-2">
                        <h2 class="title1458">Facture</h2>
                        <span class="order-id">N°: {{$order->id}}</span>
                    </div>
                    <div class="invoice-content">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="ordr-date">
                                    <b>Le:</b> {{$order->created_at->format('d/m/Y')}}
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
                                    <b>Livraison : </b>{{$order->shipping_location}}, {{$order->shipping_type}}<br>
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
                                                    <th class="text-center">Taille</th>
                                                    <th class="text-center">Couleur</th>
                                                    <th style="width:150px" class="text-center">Prix</th>
                                                    <th style="width:150px" class="text-center">Qte</th>
                                                    <th style="width:100px" class="text-center">Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order->colors as $color)
                                                    <tr>
                                                        <td>{{$color->id}}</td>
                                                        <td>
                                                            <a href="{{route('admin.products.show', $color->size->product->id)}}" target="_blank">{{$color->size->product->name}}</a>
                                                        </td>
                                                        <td class="text-center">{{$color->size->size}}</td>
                                                        <td class="text-center">
                                                            <div class="form-control" style="background-color: {{$color->color}}">
                                                            </div>

                                                        </td>
                                                        <td class="text-center">
                                                            @if($color->size->product->cashback > 0)
                                                                <s>{{$color->size->product->price}} </s>{{$color->size->product->current_price}} DZD
                                                            @else
                                                                {{$color->size->product->price}} DZD
                                                            @endif
                                                        </td>
                                                        <td class="text-center">{{$color->pivot->qte}}</td>
                                                        <td class="text-center">{{$color->size->product->current_price * $color->pivot->qte}} DZD</td>
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
                                        @if($order->cashback_sum !=  $order->sub_total)
                                            <s>{{$order->sub_total}} </s>{{$order->cashback_sum}} DZD
                                        @else
                                            {{$order->sub_total}} DZD
                                        @endif
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
                                <div class="select-status">
                                    <label for="link">Lien</label>
                                    <div class="input-group mb-2">
                                        <a href="{{$order->tracking_link}}" target="_blank">Track link</a>
                                    </div>
                                    <label for="status">Status*</label>
                                    @if($order->state === 'pending')
                                        <div class="status-active">
                                            EN ATTENTE
                                        </div>
                                    @endif
                                    @if($order->state === 'canceled')
                                        <div class="status-active">
                                            ANNULÉE
                                        </div>
                                    @endif
                                    @if($order->state === 'processing')
                                        <div class="status-active">
                                            EN TRAITEMENT
                                        </div>
                                    @endif
                                    @if($order->state === 'validated')
                                        <div class="status-active">
                                            VALIDÉ
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script src="{{asset('admin-assets/js/jquery-3.4.1.min.js')}}"></script>

<script>
    $('a.printPage').click(function(){
        $('a.printPage').toggleClass('d-none')
        window.print();
        $('a.printPage').toggleClass('d-none')
        return false;
    });
</script>

</body>


