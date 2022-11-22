<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
<div class="container-fluid top-bar">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fs-3 fw-bold text-uppercase">Bananafollowers.com</h1>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <a href="" class="btn btn-warning">Button</a>
        </div>
        <div class="col-md-9"></div>
    </div>
</div>
</body>
</html>
