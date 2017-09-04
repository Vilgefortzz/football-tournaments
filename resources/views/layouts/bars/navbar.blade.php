<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top warning-color-dark #FF8800">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
            <ul class="navbar-nav mr-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/brand-logo.jpg') }}" height="30" class="d-inline-block align-top" alt="">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </ul>
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home fa-lg"></i><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-list fa-lg"></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-soccer-ball-o fa-lg"></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-globe fa-lg"></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-bell fa-lg"></i> </a>
                </li>

            </ul>

            <ul class="navbar-nav">

                <li class="nav-item dropdown">

                    <a class="nav-link" id="navbarDropdownMenuLink-7" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->username }}
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg"
                             width="40" height="40" class="img-fluid rounded-circle">
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-7">
                        <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>