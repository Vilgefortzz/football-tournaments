<div class="container pagination-links">
    <div class="row justify-content-center">
        {{ $trophiesForSecondPlace->links('layouts.pagination.trophies.list') }}
    </div>
</div>
<div class="trophies-list">
    @foreach($trophiesForSecondPlace as $trophyForSecondPlace)
        <img src="{{ asset('images/trophies/second_place.png') }}"
             height="70">
        {{ $trophyForSecondPlace->name }}
        <br>
    @endforeach
</div>