<div class="search-filter-location-time search-filter-date-picker margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-clock-o fa-lg fa-fw" style="color: forestgreen;"></i>
        <input id="tournaments-filter-start-date" class="search-input start-date" href="{{ route('tournaments-search') }}"
               type="text" name="#" placeholder="Start date...">
    </div>
</div>
<div class="search-filter-location-time search-filter-date-picker margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-clock-o fa-lg fa-fw" style="color: darkred"></i>
        <input id="tournaments-filter-end-date" class="search-input end-date" href="{{ route('tournaments-search') }}"
               type="text" name="#" placeholder="End date...">
    </div>
</div>
<div class="search-filter-location-time search-filter-text margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-flag fa-lg fa-fw"></i>
        <input id="tournaments-filter-country" class="search-input" href="{{ route('tournaments-search') }}"
               type="text" name="#" placeholder="Country...">
    </div>
</div>
<div class="search-filter-location-time search-filter-text margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-flag-o fa-lg fa-fw"></i>
        <input id="tournaments-filter-city" class="search-input" href="{{ route('tournaments-search') }}"
               type="text" name="#" placeholder="City...">
    </div>
</div>
<div class="search-filter-game-system-points search-filter-number margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-minus-square-o fa-lg fa-fw"></i>
        <input id="tournaments-filter-min-rating" class="search-input" href="{{ route('tournaments-search') }}"
               type="number" name="#" placeholder="Min. rating..." min="0">
    </div>
</div>
<div class="search-filter-game-system-points search-filter-number margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-plus-square-o fa-lg fa-fw"></i>
        <input id="tournaments-filter-max-rating" class="search-input" href="{{ route('tournaments-search') }}"
               type="number" name="#" placeholder="Max.rating..." min="0">
    </div>
</div>

