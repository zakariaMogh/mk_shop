@extends('admin.layouts.app')

@section('title',$user->username)

@section('content')

    <h2 class="mt-30 page-title">Clients</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Clients</a></li>
        <li class="breadcrumb-item active">Consulter client</li>
    </ol>
    <div class="row">
        <div class="col-lg-5 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-body-table">
                    <div class="shopowner-content-left text-center pd-20">
                        <div class="customer_img">
                            <img src="{{$user->pic}}" alt="{{$user->username}}">
                        </div>
                        <div class="shopowner-dt-left mt-4">
                            <h4>{{ucfirst($user->first_name).' '.ucfirst($user->last_name)}}</h4>
                            <span>{{$user->username}}</span>
                        </div>
                        <ul class="product-dt-purchases">
                            <li>
                                <div class="product-status">
                                    Achats <span class="badge-item-2 badge-status">{{$user->transactions}}</span>
                                </div>
                            </li>
                            <li>
                                <div class="product-status">
                                    Points <span class="badge-item-2 badge-status">{{$user->cash}}</span>
                                </div>
                            </li>
                        </ul>
                        <div class="shopowner-dts">
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Nom</span>
                                <span class="right-dt">{{ucfirst($user->last_name)}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Prénom </span>
                                <span class="right-dt">{{$user->last_name}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Nom d'utilisateur</span>
                                <span class="right-dt">{{$user->username}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Email</span>
                                <span class="right-dt">{{$user->email}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Address</span>
                                <span class="right-dt">{{$user->address}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Wilaya</span>
                                <span class="right-dt">{{$user->wilaya}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Commune</span>
                                <span class="right-dt">{{$user->province}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">N°tel 1</span>
                                <span class="right-dt">{{$user->phone_1}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">N°tel 2</span>
                                <span class="right-dt">{{$user->phone_2 ?? '/'}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Civilité</span>
                                <span class="right-dt">{{$user->gender}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Canal</span>
                                <span class="right-dt">{{$user->canal}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">SMS</span>
                                <span class="right-dt">{{$user->sms? "oui" : 'non'}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Emailing</span>
                                <span class="right-dt">{{$user->emailing? "oui" : 'non'}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Newsletter</span>
                                <span class="right-dt">{{$user->newsletter? "oui" : 'non'}}</span>
                            </div>
                            <div class="shopowner-dt-list">
                                <span class="left-dt">Offers</span>
                                <span class="right-dt">{{$user->offers? "oui" : 'non'}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
