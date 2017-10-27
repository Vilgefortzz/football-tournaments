@if(Auth::user()->isClubPresident())
    <div href="#" id="contracts-extend" class="tile menu-card dynamic-content-card">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <br>
        <div class="text text-center">
            <h1>Extend contracts</h1>
            <h1><i class="fa fa-users fa-2x"></i></h1>
            <h2 class="animate-text">Extend contracts with footballers</h2>
            <p class="animate-text">See completed contracts which you want to extend, see all details </p>
        </div>
    </div>
    <div id="club-waiting-contracts" href="{{ route('club-contracts-created', Auth::user()->club->id) }}"
         class="tile menu-card">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header text-center pull-right">
                    <span class="badge badge-pill my-color"
                          data-number-contracts="{{ Auth::user()->club->numberOfWaitingContracts() }}">
                        <i class="fa fa-file-text fa-fw" aria-hidden="true"></i>
                        {{ Auth::user()->club->numberOfWaitingContracts() }}
                    </span>
        </h1>
        <br>
        <div class="text text-center">
            <h1>Waiting contracts</h1>
            <h1><i class="fa fa-database fa-2x"></i></h1>
            <h2 class="animate-text">Club waiting contracts</h2>
            <p class="animate-text">See all club waiting for signature contracts </p>
        </div>
    </div>
    <div id="club-signed-contracts" href="{{ route('club-contracts-signed', Auth::user()->club->id) }}"
         class="tile menu-card">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header text-center pull-right">
                    <span class="badge badge-pill my-color"
                          data-number-contracts="{{ Auth::user()->club->numberOfSignedContracts() }}">
                        <i class="fa fa-file-text fa-fw" aria-hidden="true"></i>
                        {{ Auth::user()->club->numberOfSignedContracts() }}
                    </span>
        </h1>
        <br>
        <div class="text text-center">
            <h1>Signed contracts</h1>
            <h1>
                <i class="fa fa-database fa-2x"></i>
                <i class="fa fa-check fa-2x"></i>
            </h1>
            <h2 class="animate-text">Club signed contracts</h2>
            <p class="animate-text">See all signed by the club contracts </p>
        </div>
    </div>
@elseif(Auth::user()->isFootballer())
    @if(Auth::user()->haveBindingContract())
        <div href="{{ route('user-contracts-binding', Auth::user()->id) }}" class="tile menu-card dynamic-content-card">
            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
            <br>
            <div class="text text-center">
                <h1>Binding contract</h1>
                <h1><i class="fa fa-star fa-2x"></i></h1>
                <h2 class="animate-text">Your signed contract</h2>
                <p class="animate-text">See details of your binding contract </p>
            </div>
        </div>
    @endif
    <div id="footballer-waiting-contracts" href="{{ route('user-contracts-created', Auth::user()->id) }}"
         class="tile menu-card">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header text-center pull-right">
                    <span class="badge badge-pill my-color"
                          data-number-contracts="{{ Auth::user()->numberOfWaitingContracts() }}">
                        <i class="fa fa-file-text fa-fw" aria-hidden="true"></i>
                        {{ Auth::user()->numberOfWaitingContracts() }}
                    </span>
        </h1>
        <br>
        <div class="text text-center">
            <h1>Waiting contracts</h1>
            <h1><i class="fa fa-database fa-2x"></i></h1>
            <h2 class="animate-text">Your waiting contracts</h2>
            <p class="animate-text">See all your waiting contracts, sign it or reject </p>
        </div>
    </div>
@endif