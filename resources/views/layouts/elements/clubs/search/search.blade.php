{{-- Search club - input --}}
@include('layouts.elements.clubs.search.box')
{{-- Search sort options button --}}
<a id="show-sort-options" href="#" class="btn btn-circle-filter my-color-2" role="button">
    <i class="fa fa-sort"></i>
</a>
<a id="hide-sort-options" href="#" class="btn btn-circle-filter my-color-2" role="button">
    <i class="fa fa-angle-double-left"></i>
</a>
{{-- Search filters button --}}
<a id="show-filters" href="#" class="btn btn-circle-filter my-color-2" role="button">
    <i class="fa fa-filter"></i>
</a>
<a id="hide-filters" href="#" class="btn btn-circle-filter my-color-2" role="button">
    <i class="fa fa-angle-double-left"></i>
</a>
{{-- Search filters --}}
@include('layouts.elements.clubs.search.filters')

<div class="container">
    <div class="row justify-content-center">
        @include('layouts.elements.clubs.search.sort-options')
    </div>
</div>