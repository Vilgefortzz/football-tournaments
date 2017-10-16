@foreach($footballers as $footballer)
    <div id="user-{{$footballer->id}}" class="tile tile-users user-card"
         href="#">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header pull-right">
            <span class="badge badge-pill my-color">
                <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                {{ $footballer->main_football_position }}
            </span>
        </h1>
        <h1 class="text-display" style="margin-bottom: 0">
            <span class="badge badge-pill my-color-3">
                <i class="fa fa-flag-o fa-fw" aria-hidden="true"></i>
                @if($footballer->haveCountryAndCity())
                    {{ $footballer->country }} | {{ $footballer->city }}
                @elseif($footballer->haveCountry())
                    {{ $footballer->country }}
                @elseif($footballer->haveCity())
                    {{ $footballer->city }}
                @endif
            </span>
        </h1>
        @if($footballer->haveClub())
            @if($footballer->isInYourClub())
                <h1 class="text-display">
             <span class="badge badge-pill my-color">
                 <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                     This is your teammate !
             </span>
                </h1>
            @else
                <br>
            @endif
        @endif

        <h1 class="text-header text-center">
            <img src="{{ asset($footballer->avatar_dir. $footballer->avatar) }}"
                 width="150" height="150">
        </h1>
        <h1 class="text-header text-center" style="margin-bottom: 20px">
            {{ $footballer->username }}
        </h1>
        <div class="text-clubs text-center">
            <h6 class="animate-text">
               <i class="fa fa-map-marker fa-fw" style="color: gold"></i> Played matches: {{ $footballer->played_matches }}
            </h6>
            <h6 class="animate-text">
                <i class="fa fa-trophy fa-fw"></i> Won trophies: {{ $footballer->won_trophies }}
            </h6>
            <h6 class="animate-text">
                <i class="fa fa-futbol-o"></i> All Goals: {{ $footballer->goals }}
            </h6>
            <h6 class="animate-text">
                <i class="fa fa-mail-forward"></i> All Assists: {{ $footballer->assists }}
            </h6>

            {{--TODO: Propose contract for footballer--}}
        </div>
    </div>
@endforeach
<div class="container pagination-links" style="margin-top: 15px">
    <div class="row justify-content-center">
        {{ $clubs->links('layouts.pagination.users.footballers.searchable-cards') }}
    </div>
</div>