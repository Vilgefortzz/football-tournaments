<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- App icon -->
    <link href="{{{ asset('images/favicon.png') }}}" rel="shortcut icon">

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-4.0.0-beta/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdbootstrap-4/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        @include('layouts.bars.navbar')
        <div class="container navbar-margin">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-4.0.0-beta/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/mdbootstrap-4/mdb.min.js') }}" type="text/javascript"></script>
    @yield('scripts')

</body>
</html>
