@foreach($footballers as $footballer)
    <div id="user-{{$footballer->id}}" class="tile tile-users footballer-card"
         href="#">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header pull-right">
            <span class="badge badge-pill my-color pull-right">
                <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                {{ $footballer->main_football_position }}
            </span>
            <br>
            @if($footballer->haveClub())
                @if($footballer->isInYourClub())
                     <span class="badge badge-pill my-color-4" style="font-size: 12px;">
                         <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                             Teammate !
                     </span>
                @endif
            @endif
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
        <h1 class="text-display">
            <span class="badge badge-pill my-color">
                <i class="fa fa-map-marker fa-fw" style="color: gold"></i>
                {{ $footballer->played_matches }} |
                <i class="fa fa-soccer-ball-o fa-fw" aria-hidden="true"></i>
                {{ $footballer->goals }} |
                <i class="fa fa-mail-forward fa-fw" aria-hidden="true"></i>
                {{ $footballer->assists }}
            </span>
        </h1>
        <h1 class="text-display" style="margin-bottom: 0">
            <span class="badge badge-pill my-color-3">
                <i class="fa fa-male fa-fw" aria-hidden="true"></i>
                Preferred positions:
            </span>
        </h1>
        <h1 class="text-display">
            <span class="badge badge-pill my-color">
                LW | RW | AM
            </span>
        </h1>
        <h1 class="text-header text-center">
            <img src="{{ asset($footballer->avatar_dir. $footballer->avatar) }}"
                 width="100" height="100">
        </h1>
        <h1 class="text-header text-center">
            {{ $footballer->username }}
        </h1>
        @if(Auth::user()->isClubPresident())
            @if($footballer->haveBindingContract())
                <h1 class="text-header text-center animate-text">
                    <button class="btn btn-circle my-color" role="button" disabled>
                        <i class="fa fa-file-text"></i>
                    </button>
                </h1>
                <h6 class="text-center animate-text font-italic">
                    {{$remainingContractDuration[$footballer->id]}} days left
                </h6>
            @else
                @if($footballer->isContractProposed())
                    <h1 class="text-header text-center animate-text">
                        <button class="btn btn-circle my-color-3" role="button" disabled>
                            <i class="fa fa-file-text"></i>
                        </button>
                    </h1>
                    <h6 class="text-center animate-text">
                         <span class="badge my-color-4">
                            Contract is already created for this footballer
                        </span>
                    </h6>
                @else
                    <h1 class="text-header text-center animate-text">
                        <a href="#" class="btn btn-circle my-color-3 propose-contract-footballer"
                           data-footballer-id="{{$footballer->id}}" role="button">
                            <i class="fa fa-file-text"></i>
                        </a>
                    </h1>
                    <div id="propose-contract-footballer-{{$footballer->id}}"
                         class="text-join-requests propose-contract-section text-center animate-text">

                        Contract duration:
                        <div class="styled-select my-color rounded">
                            <select id="duration-footballer-{{$footballer->id}}">
                                <option value="1" selected="selected">1 week</option>
                                <option value="2">2 weeks</option>
                                <option value="3">1 month</option>
                                <option value="4">2 months</option>
                            </select>
                        </div>

                        <input type="text" id="username-footballer-{{$footballer->id}}">
                        <label class="font-italic"
                               for="username-footballer-{{$footballer->id}}">Make your signature</label>
                        <div class="bar"></div>

                        <a href="{{ route('contract-store', $footballer->id) }}"
                           class="btn btn-sm my-color-3 create-contract-footballer" data-footballer-id="{{$footballer->id}}">
                            <i class="fa fa-handshake-o fa-lg fa-fw"></i>  Propose the contract
                        </a>
                    </div>
                @endif
            @endif
        @endif
    </div>
@endforeach
<div class="container pagination-links" style="margin-top: 15px">
    <div class="row justify-content-center">
        {{ $footballers->links('layouts.pagination.users.footballers.searchable-cards') }}
    </div>
</div>