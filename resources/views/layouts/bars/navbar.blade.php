<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top navbar-color">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/brand-logo.png') }}" height="30" class="d-inline-block align-top" alt="">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </li>
            </ul>

            @if(Auth::check())
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-home fa-lg"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-trophy fa-lg"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('clubs-menu') }}"><i class="fa fa-users fa-lg"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('contracts-menu') }}">
                            <i class="fa fa-file-text fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-bar-chart fa-lg"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-globe fa-lg"></i> </a>
                    </li>
                </ul>
            @endif

            <ul class="navbar-nav">

                @if(Auth::check())
                    <li class="nav-item dropdown">

                        <a class="nav-link font-bold" id="avatar-dropdown" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset(Auth::user()->avatar_dir. Auth::user()->avatar) }}"
                                 width="40" height="40" class="img-fluid rounded-circle">
                            {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="avatar-dropdown">
                            <a class="dropdown-item menu-link"
                               href="{{ route('user-profile', Auth::user()->id) }}" style="color: #ec2652 !important;">
                                <i class="fa fa-user-circle-o"></i> Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="color: #ec2652 !important;">
                                <i class="fa fa-sign-out"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>