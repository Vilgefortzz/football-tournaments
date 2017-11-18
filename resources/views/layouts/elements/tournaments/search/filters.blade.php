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
               type="number" name="#" placeholder="Min. points..." min="0">
    </div>
</div>
<div class="search-filter-game-system-points search-filter-number margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-plus-square-o fa-lg fa-fw"></i>
        <input id="tournaments-filter-max-rating" class="search-input" href="{{ route('tournaments-search') }}"
               type="number" name="#" placeholder="Max. points..." min="0">
    </div>
</div>
<div class="search-filter-game-system-points search-filter-select margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-gamepad fa-lg fa-fw"></i>
        <select id="tournaments-filter-game-system" class="search-select" href="{{ route('tournaments-search') }}">
            <option value="0" selected="selected">Select game system</option>
            <option value="single elimination">single elimination</option>
            <option value="everyone with each other">everyone with each other</option>
        </select>
    </div>
</div>
<div class="search-filter-seats-status search-filter-select margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-users fa-lg fa-fw"></i>
        <select id="tournaments-filter-number-of-seats" class="search-select" href="{{ route('tournaments-search') }}">
            <option value="0" selected="selected">Select number of seats</option>
            <option value="2">2</option>
            <option value="4">4</option>
            <option value="8">8</option>
            <option value="16">16</option>
            <option value="32">32</option>
        </select>
    </div>
</div>
<div class="search-filter-seats-status search-filter-select margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-unlock-alt fa-lg fa-fw"></i>
        <select id="tournaments-filter-status" class="search-select" href="{{ route('tournaments-search') }}">
            <option value="0" selected="selected">Select status</option>
            <option value="open">open</option>
            <option value="ongoing">ongoing</option>
            <option value="closed">closed</option>
        </select>
    </div>
</div>
