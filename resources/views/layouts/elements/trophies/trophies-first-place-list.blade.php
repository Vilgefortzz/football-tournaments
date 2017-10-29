<div class="container pagination-links">
    <div class="row justify-content-center">
        {{ $trophiesForFirstPlace->links('layouts.pagination.trophies.list') }}
    </div>
</div>
<div class="trophies-list">
    @foreach($trophiesForFirstPlace as $trophyForFirstPlace)
        <img src="{{ asset('images/trophies/first_place.png') }}"
             height="70">
        {{ $trophyForFirstPlace->name }}
        <br>
    @endforeach
</div>