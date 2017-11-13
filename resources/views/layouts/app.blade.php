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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        @include('layouts.bars.navbar')
        <div class="container navbar-margin">
            @include('layouts.links.links')
            @yield('content')
        </div>
    </div>

    <script type="text/javascript">
        var baseUrl = '{{ url('/').'/' }}';
        var contractValidateJsUrl = '{{ asset('js/contracts/contracts-validate.js') }}';
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-4.0.0-beta/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/mdbootstrap-4/mdb.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/moment.js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/setup/ajax-setup.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/link-active.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/tabs-active.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/process-steps.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/chosen-cards.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/flashy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/menu-cards.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/search/search-list-buttons.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/search/filters-show-hide.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/search/sort.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/users/footballers/search/search-with-filters.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/users/footballers/football-positions/football-positions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/users/footballers/pagination-ajax.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/clubs/club-join.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/clubs/menu/your-club-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/clubs/search/search-with-filters.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/clubs/pagination-ajax.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/clubs/requests-to-join/request-delete.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/clubs/requests-to-join/pagination-ajax.js') }}" type="text/javascript"></script>

    @if(Auth::check() && Auth::user()->haveClub() && !Auth::user()->isOrganizer())
        <script src="{{ asset('js/contracts/contracts-validate.js') }}" type="text/javascript"></script>
    @endif

    <script src="{{ asset('js/trophies/trophies.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/trophies/pagination-ajax.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/contracts/contract-create.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/contracts/contract-sign.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/contracts/contract-extend.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/contracts/contract-delete.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/contracts/pagination-ajax.js') }}" type="text/javascript"></script>
    <div id="dynamic-scripts"></div>
    @yield('scripts')
    @include('layouts.flashy.message')

</body>
</html>
