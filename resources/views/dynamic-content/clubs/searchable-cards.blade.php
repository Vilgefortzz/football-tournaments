@foreach($clubs as $club)
    <div id="club-{{$club->id}}" class="tile tile-clubs club-card"
         href="#">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header pull-right">
            <span class="badge badge-pill my-color">
                <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                {{ $club->tournament_points }}
            </span>
        </h1>
        <h1 class="text-display" style="margin-bottom: 0">
            <span class="badge badge-pill my-color-3">
                <i class="fa fa-flag-o fa-fw" aria-hidden="true"></i>
                @if($club->haveCountryAndCity())
                    {{ $club->country }} | {{ $club->city }}
                @elseif($club->haveCountry())
                    {{ $club->country }}
                @elseif($club->haveCity())
                    {{ $club->city }}
                @endif
            </span>
        </h1>
        @if($club->isYourClub())
            <h1 class="text-display">
             <span class="badge badge-pill my-color">
                 <i class="fa fa-users fa-fw" aria-hidden="true"></i>
                     Your club !
             </span>
            </h1>
        @else
            <br>
        @endif

        <h1 class="text-header text-center">
            <img src="{{ asset($club->emblem_dir. $club->emblem) }}"
                 width="150" height="150">
        </h1>
        <h1 class="text-header text-center" style="margin-bottom: 20px">
            {{ $club->name }}
        </h1>
        <div class="text-clubs text-center">
            <h6 class="animate-text">
                <i class="fa fa-star fa-fw" style="color: gold;"></i> Place on the leaderboard: {{ $club->placeOnTheLeaderboard() }}
            </h6>
            <h6 class="animate-text">
               <i class="fa fa-address-card fa-fw"></i> Footballers in club: {{ $club->number_of_footballers }}
            </h6>
            <h6 class="animate-text">
                <i class="fa fa-futbol-o"></i> All Goals: {{ $club->goals }}
            </h6>
            <h6 class="animate-text">
                <i class="fa fa-mail-forward"></i> All Assists: {{ $club->assists }}
            </h6>
            @if(Auth::user()->isFootballer() && !Auth::user()->haveClub())
                <h5 class="animate-text">
                    @if($club->isRequestSentToJoin())
                        <span class="badge my-color-4">
                            <i class="fa fa-check fa-fw" aria-hidden="true"></i>
                            Request to join this club was sent
                        </span>
                    @elseif($club->isContractProposed())
                        <span class="badge my-color-4">
                            Contract is ready. Sign it ->
                                <a href="{{ route('user-contracts-created', Auth::user()->id) }}" class="contracts-link">
                                    <i class="fa fa-file-text fa-fw" aria-hidden="true"></i>
                                </a>
                        </span>
                    @else
                        <a href="{{ route('club-join', $club->id) }}"
                           class="btn btn-sm my-color-3 join-club">
                            <i class="fa fa-users fa-lg fa-fw"></i>  Try to join the club
                        </a>
                    @endif
                </h5>
            @endif
        </div>
    </div>
@endforeach
<div class="container pagination-links" style="margin-top: 15px">
    <div class="row justify-content-center">
        {{ $clubs->links('layouts.pagination.clubs.searchable-cards') }}
    </div>
</div>