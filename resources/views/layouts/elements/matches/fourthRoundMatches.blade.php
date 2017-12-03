<div class="matches-list"
     data-tournament-start-date="{{ \Carbon\Carbon::parse($tournament->start_date)->format('d/m/Y') }}"
     data-tournament-end-date="{{ \Carbon\Carbon::parse($tournament->end_date)->format('d/m/Y') }}">
    @foreach($fourthRoundMatches as $fourthRoundMatch)
        @if($isFinalRound)
            <h5 class="font-bold">
                @if($fourthRoundMatch->isThirdPlaceMatch($thirdPlaceMatchId))
                    <i class="fa fa-trophy fa-fw" style="color: saddlebrown"></i>
                    Third place match
                @elseif($fourthRoundMatch->isFirstPlaceMatch($firstPlaceMatchId))
                    <i class="fa fa-trophy fa-fw" style="color: gold"></i>
                    FINAL
                @endif
            </h5>
        @endif
        @if(Auth::user()->isOrganizer() && $tournament->isYourTournament())
            <div class="form-group">
                <div class="input-container">
                    <input id="match-start-date-and-time" type="text" href="{{ route('match-update', $fourthRoundMatch->id) }}"
                           name="start_date_and_time" placeholder="match date"
                           class="inline-input-width start-date-and-time match-detail"
                           value="{{ $fourthRoundMatch->start_date_and_time ?
                            \Carbon\Carbon::parse($fourthRoundMatch->start_date_and_time)->format('d/m/Y H:i') : '' }}">
                </div>
            </div>
        @else
            <h5 class="font-bold" style="color: darkred">
                <i class="fa fa-clock-o fa-fw"></i>
                @if($fourthRoundMatch->hasStartDateAndTime())
                    {{ \Carbon\Carbon::parse($fourthRoundMatch->start_date_and_time)->format('d/m/Y H:i') }}
                @else
                    ---
                @endif
            </h5>
        @endif
        <h6>
            <img src="{{ asset($fourthRoundMatch->first_club_emblem_dir. $fourthRoundMatch->first_club_emblem) }}"
                 width="60" height="60" class="img-fluid rounded-circle">
            {{ $fourthRoundMatch->first_club}}
            <span class="font-bold">vs</span>
            {{ $fourthRoundMatch->second_club}}
            <img src="{{ asset($fourthRoundMatch->second_club_emblem_dir. $fourthRoundMatch->second_club_emblem) }}"
                 width="60" height="60" class="img-fluid rounded-circle">
        </h6>
        @if(Auth::user()->isOrganizer() && $tournament->isYourTournament())
            <div class="form-group" style="margin-top: -20px">
                <div class="input-container">
                    <span class="badge my-color-3">
                        <input id="match-result-first-club" type="number" href="{{ route('match-update', $fourthRoundMatch->id) }}"
                               name="result_first_club" class="inline-input-result-width match-detail"
                               value="{{ $fourthRoundMatch->result_first_club }}" min="0" style="height: 18px; color: white">:
                        <input id="match-result-second-club" type="number" href="{{ route('match-update', $fourthRoundMatch->id) }}"
                               name="result_second_club" class="inline-input-result-width match-detail"
                               value="{{ $fourthRoundMatch->result_second_club }}" min="0" style="height: 18px; color: white">
                    </span>
                </div>
            </div>
        @else
            <h5 class="font-bold" style="margin-top: -20px">
                <span class="badge badge-pill my-color-3">
                    @if($fourthRoundMatch->hasResults())
                        {{ $fourthRoundMatch->result_first_club }} : {{ $fourthRoundMatch->result_second_club }}
                    @else
                        --- : ---
                    @endif
                </span>
            </h5>
        @endif
        <hr>
    @endforeach
</div>
<div class="container pagination-links">
    <div class="row justify-content-center">
        {{ $fourthRoundMatches->links('layouts.pagination.matches.list') }}
    </div>
</div>