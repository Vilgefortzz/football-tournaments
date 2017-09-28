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
@elseif(Auth::user()->isFootballer())
    @if(Auth::user()->haveBindingContract())
        <div href="{{ route('user-contracts-binding', Auth::user()->id) }}" id="signed-contract"
             class="tile menu-card dynamic-content-card">
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
@endif

<div href="{{ route('contracts-management-menu') }}" id="contracts-management" class="tile menu-card dynamic-content-card">
    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
    <br>
    <div class="text text-center">
        <h1>Manage contracts</h1>
        <h1><i class="fa fa-file-text fa-2x"></i></h1>
        <h2 class="animate-text">Contracts management</h2>
        <p class="animate-text">See all contracts you want to sign, their status,
            rejected or completed contracts </p>
    </div>
</div>
