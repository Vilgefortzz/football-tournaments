<div class="matches-list"
     data-tournament-start-date="{{ \Carbon\Carbon::parse($tournament->start_date)->format('d/m/Y') }}"
     data-tournament-end-date="{{ \Carbon\Carbon::parse($tournament->end_date)->format('d/m/Y') }}">
    @foreach($firstRoundMatches as $firstRoundMatch)
        @if(Auth::user()->isOrganizer() && $tournament->isYourTournament())
            <div class="form-group">
                <div class="input-container">
                    <input id="match-start-date-and-time" type="text" href="{{ route('match-update', $firstRoundMatch->id) }}"
                           name="start_date_and_time" placeholder="match date"
                           class="inline-input-width start-date-and-time match-detail"
                           value="{{ $firstRoundMatch->start_date_and_time ?
                            \Carbon\Carbon::parse($firstRoundMatch->start_date_and_time)->format('d/m/Y H:i') : '' }}">
                </div>
            </div>
        @else
            <h5 class="font-bold" style="color: darkred">
                <i class="fa fa-clock-o fa-fw"></i>
                @if($firstRoundMatch->hasStartDateAndTime())
                    {{ \Carbon\Carbon::parse($firstRoundMatch->start_date_and_time)->format('d/m/Y H:i') }}
                @else
                    ---
                @endif
            </h5>
        @endif
        <h6>
            <img src="{{ asset($firstRoundMatch->first_club_emblem_dir. $firstRoundMatch->first_club_emblem) }}"
                 width="60" height="60" class="img-fluid rounded-circle">
            {{ $firstRoundMatch->first_club}}
            <span class="font-bold">vs</span>
            {{ $firstRoundMatch->second_club}}
            <img src="{{ asset($firstRoundMatch->second_club_emblem_dir. $firstRoundMatch->second_club_emblem) }}"
                 width="60" height="60" class="img-fluid rounded-circle">
        </h6>
        <h5 class="font-bold" style="margin-top: -20px">
            <span class="badge badge-pill my-color-3">
                @if($firstRoundMatch->hasResults())
                    {{ $firstRoundMatch->result_first_club }} : {{ $firstRoundMatch->result_second_club }}
                @else
                    --- : ---
                @endif
            </span>
        </h5>
        <hr>
    @endforeach
</div>
<div class="container pagination-links">
    <div class="row justify-content-center">
        {{ $firstRoundMatches->links('layouts.pagination.matches.list') }}
    </div>
</div>