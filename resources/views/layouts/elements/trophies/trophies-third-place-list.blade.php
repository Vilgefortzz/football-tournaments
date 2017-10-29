<div class="container pagination-links">
    <div class="row justify-content-center">
        {{ $trophiesForThirdPlace->links('layouts.pagination.trophies.list') }}
    </div>
</div>
<div class="trophies-list">
    @foreach($trophiesForThirdPlace as $trophyForThirdPlace)
        <img src="{{ asset('images/trophies/third_place.png') }}"
             height="70">
        {{ $trophyForThirdPlace->name }}
        <br>
    @endforeach
</div>