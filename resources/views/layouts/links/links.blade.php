@if(Auth::check())
    <div href="{{ route('user-contracts-binding', Auth::user()->id) }}" class="contract-binding" hidden></div>
    <div href="{{ route('user-contracts-created', Auth::user()->id) }}" class="contracts-created" hidden></div>

    @if(Auth::user()->haveClub())
        <div href="{{ route('club-contracts-signed', Auth::user()->club->id) }}" class="contracts-signed" hidden></div>
        <div href="{{ route('club-validate-contracts', Auth::user()->club->id) }}" class="contracts-validate" hidden></div>
    @endif

    @if(Auth::user()->isClubPresident())
        <div href="{{ route('club-join-requests', Auth::user()->club->id) }}" class="requests-to-join-the-club" hidden></div>
        <div href="{{ route('footballers-list-search') }}" class="footballers-list" hidden></div>
    @endif

    <div id="dynamic-urls"></div>
@endif
