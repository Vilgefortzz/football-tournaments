<div class="search-filter search-filter-text margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-flag fa-lg fa-fw"></i>
        <input id="footballers-filter-country" class="search-input" href="{{ route('footballers-search') }}"
               type="text" name="#" placeholder="Country...">
    </div>
</div>
<div class="search-filter search-filter-text margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-flag-o fa-lg fa-fw"></i>
        <input id="footballers-filter-city" class="search-input" href="{{ route('footballers-search') }}"
               type="text" name="#" placeholder="City...">
    </div>
</div>
<div class="search-filter search-filter-select margin-filter">
    <div class="input-group" style="align-items: center">
        <i class="fa fa-male fa-lg fa-fw"></i>
        <select id="footballers-filter-football-position" class="search-select" href="{{ route('footballers-search') }}" name="#">
            <option value="0" selected="selected">Select football position</option>
            @foreach($footballPositions as $footballPosition)
                <option value="{{$footballPosition->id}}">{{$footballPosition->name}}</option>
            @endforeach
        </select>
    </div>
</div>

