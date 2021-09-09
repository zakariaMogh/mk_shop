@extends('front.layouts.app')



@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
         style="background: rgba(0, 0, 0, 0) url({{asset('front-assets/images/bg/2.png')}})  ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Checkout</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{route('home')}}">Accueille</a>
                                <span class="brd-separetor">/</span>
                                <a class="breadcrumb-item" href="{{route('order.index')}}">Commandes</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Profil</span>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <section class="profile-section htc__team__area htc__team__page  ptb--120"
             style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                    <div class="htc__contact__container">

                        <div class="contact-form-wrap">
                            <div class="contact-title">
                                <h2 class="contact__title">{{auth()->user()->username}}</h2>
                            </div>
                            @include('front.layouts.partials.messages')
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger small">*{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form action="{{route('profile.update')}}" method="post">
                                @method('put')
                                @csrf
                                <div class="single-contact-form">
                                    <div class="contact-box ">
                                        <input type="email" name="email" placeholder="Email*" value="{{auth()->user()->email}}">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name="username" placeholder="Nome*" value="{{auth()->user()->username}}" >
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="password" name="old_password" placeholder="Ancien mot de passe*">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="password" name="password" placeholder="Nouveau mot de passe">
                                        <input type="password" name="password_confirmation" placeholder="Confirmation du mot de passe">
                                    </div>
                                </div>
                                <br>
                                <br>

                                <div class="contact-btn ">
                                    <button type="submit" class="fv-btn "> Envoyez</button>
                                </div>
                            </form>
                        </div>
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
