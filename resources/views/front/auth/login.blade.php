@extends('front.layouts.app')

@section('content')
    <!-- Start Login Register Area -->
    <div class="htc__login__register bg__white ptb--100"
         style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="login__register__menu" role="tablist">
                        <li role="presentation" class="login active"><a href="#">Login</a></li>
                        <li role="presentation" class="register"><a href="{{route('register')}}" >Register</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Start Login Register Content -->
            <div class="row">

                <div class="col-md-6 col-md-offset-3">

                    <div class="htc__login__register__wrap">
                        @if(session()->has('error'))
                            <div class="col-12 text-center">
                                <div class="alert alert-danger">{{session('error')}}</div>
                            </div>
                    @endif
                        <!-- Start Single Content -->
                        <form id="login"
                              role="tabpanel"
                              class="single__tabs__panel tab-pane fade in active"
                              method="post" action="{{route('login')}}" >
                            <div class="login" >
                                @csrf
                                <input  id="email" type="email"
                                       placeholder="example@email.com*" name="email">
                                @error('email')
                                <span class="text-danger small" >
                                        *{{ $message }}
                                    </span>
                                @enderror

                                <input  id="password" type="password"
                                        placeholder="********" name="password">
                                @error('password')
                                <span class="text-danger small" >
                                        *{{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="tabs__checkbox">
                                <input type="checkbox" name="remember_me">
                                <span> Remember me</span>
                                <span class="forget"><a href="{{route('forgot.password.email')}}">Forget Pasword?</a></span>
                            </div>
                            <div class="htc__login__btn mt--30">
                                <a onclick="login()" href="#">Login</a>
                            </div>
                            <div class="htc__social__connect">
                                <h2>Or Login With</h2>
                                <ul class="htc__soaial__list">
                                    <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>

                                    <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>

                                    <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>

                                    <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
            <!-- End Login Register Content -->
        </div>
    </div>
    <!-- End Login Register Area -->
@endsection
@push('js')
    <script>
        function login()
        {
            $('#login').submit()
        }

        function register()
        {
            $('#register').submit()
        }
    </script>
@endpush
