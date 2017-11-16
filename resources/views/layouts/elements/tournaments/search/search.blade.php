{{-- Search club - input --}}
@include('layouts.elements.tournaments.search.box')
{{-- Search list button --}}
<a id="show-tournaments-list" href="{{ route('tournaments-list-search') }}" class="btn btn-circle-filter my-color-2" role="button">
    <i class="fa fa-list"></i>
</a>
{{-- Search sort options button --}}
<a id="show-sort-options" href="#" class="btn btn-circle-filter my-color-2" role="button">
    <i class="fa fa-sort"></i>
</a>
<a id="hide-sort-options" href="#" class="btn btn-circle-filter my-color-2" role="button">
    <i class="fa fa-angle-double-left"></i>
</a>
{{-- Search filters buttons --}}
<a id="show-location-time-filters" href="#" class="btn btn-circle-filter-tournaments my-color-2" role="button">
    <i class="fa fa-map-marker" style="color: saddlebrown"></i>
    <i class="fa fa-clock-o" style="color: darkslateblue"></i>
</a>
<a id="show-game-system-points-filters" href="#" class="btn btn-circle-filter-tournaments my-color-2" role="button">
    <i class="fa fa-money" style="color: forestgreen"></i>
    <i class="fa fa-gamepad" style="color: silver"></i>
</a>
<a id="show-seats-status-filters" href="#" class="btn btn-circle-filter-tournaments my-color-2" role="button">
    <i class="fa fa-users" style="color: #536dfe"></i>
    <i class="fa fa-unlock-alt" style="color: chocolate"></i>
</a>
<a id="hide-location-time-filters" href="#" class="btn btn-circle-filter my-color-2" role="button">
    <i class="fa fa-angle-double-left"></i>
</a>
<a id="hide-game-system-points-filters" href="#" class="btn btn-circle-filter my-color-2" role="button">
    <i class="fa fa-angle-double-left"></i>
</a>
<a id="hide-seats-status-filters" href="#" class="btn btn-circle-filter my-color-2" role="button">
    <i class="fa fa-angle-double-left"></i>
</a>
{{-- Search filters --}}
@include('layouts.elements.tournaments.search.filters')

<div class="container">
    <div class="row justify-content-center">
        @include('layouts.elements.tournaments.search.sort-options')
    </div>
</div>