<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Banana Followers Login</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{asset('vendors/simplebar/css/simplebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendors/simplebar.css')}}">
    <!-- Main styles for this application-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link href="{{asset('css/examples.css')}}" rel="stylesheet">

</head>

<body>
<div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
{{--                    <img src="{{asset('images/logo.png')}}" class="img-fluid" width="180" alt="banana followers">--}}
                </div>
                <div class="card mb-4 mx-4">
                    <form action="{{route('auth.login.post')}}" method="post">
                        @csrf
                        <div class="card-body p-4">
                            <h1 class="text-primary">Log In</h1>
                            <p class="text-medium-emphasis">Sign In to your account.</p>

                            <div class="input-group mb-3"><span class="input-group-text">
                  <svg class="icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
                  </svg></span>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" value="{{old('email')}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3"><span class="input-group-text">
                  <svg class="icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
                  </svg></span>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" value="{{old('password')}}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 mx-auto col-5">
                                <button class="btn btn-primary" type="submit">Sign In</button>
                            </div>

                            <div class="d-grid gap-2 mx-auto col-8 mt-4">
                                <a href="{{route('auth.register')}}" class="btn btn-light fw-bold" type="submit">Create an account</a>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
<script src="{{asset('vendors/simplebar/js/simplebar.min.js')}}"></script>
<script>
</script>

</body>

</html>
