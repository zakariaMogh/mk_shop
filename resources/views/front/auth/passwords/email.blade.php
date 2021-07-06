@extends('front.layouts.app')

@section('content')
    <!-- Start Login Register Area -->
    <div class="htc__login__register bg__white ptb--100"
         style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="login__register__menu" role="tablist">
                        <li role="presentation" class="login active"><a href="#">Frogot password</a></li>

                    </ul>
                </div>
            </div>
            <!-- Start Login Register Content -->
            <div class="row">

                <div class="col-md-6 col-md-offset-3">

                    <div class="htc__login__register__wrap">
                        @if(session()->has('status'))
                            <div class="col-12 text-center">
                                <div class="alert alert-success">{{session('status')}}</div>
                            </div>
                    @endif
                        <!-- Start Single Content -->
                        <form id="login"
                              class="single__tabs__panel tab-pane fade in active"
                              method="post" action="{{route('forgot.password.send')}}" >
                            <div class="login" >
                                @csrf
                                <input  id="email" type="email"
                                       placeholder="example@email.com*" name="email">
                                @error('email')
                                <span class="text-danger small" >
                                        *{{ $message }}<br>
                                    </span>
                                @enderror
                                <span class="text-muted small mt-1">
                    Enter the email address associated with your account <br>
                </span>

                            </div>
                            <div class="tabs__checkbox">
                                <span class="forget"><a href="{{route('login')}}">Back to login</a></span>
                            </div>
                            <div class="htc__login__btn mt--30">
                                <a onclick="login()" href="#">Send</a>
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
