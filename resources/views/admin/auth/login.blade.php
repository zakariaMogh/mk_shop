<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description-gambolthemes" content="">
    <meta name="author-gambolthemes" content="">
    <title>Login Admin</title>
    <link href="{{asset('admin-assets/css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/css/admin-style.css')}}" rel="stylesheet">

    <!-- Vendor Stylesheets -->
    <link href="{{asset('admin-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

</head>

<body class="bg-sign">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header card-sign-header">
                                <h3 class="text-center font-weight-light my-4">S'identifier</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())

                                    <div class="w-100 px-4 text-danger mb-2">
                                        @foreach ($errors->all() as $error)
                                            * {{ $error }}<br>
                                        @endforeach
                                    </div>

                                @endif
                                <form action="{{route('admin.login')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-3" id="inputEmailAddress" type="email"
                                               placeholder="Adresse Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="inputPassword">Mot de passe</label>
                                        <input class="form-control py-3" id="inputPassword" type="password"
                                               placeholder="Mot de passe" name="password">
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-sign hover-btn" href="">S'identifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="{{asset('admin-assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin-assets/js/scripts.js')}}"></script>

</body>
</html>
