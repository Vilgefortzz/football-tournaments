<div class="matches-list"
     data-tournament-start-date="{{ \Carbon\Carbon::parse($tournament->start_date)->format('d/m/Y') }}"
     data-tournament-end-date="{{ \Carbon\Carbon::parse($tournament->end_date)->format('d/m/Y') }}">
    @foreach($secondRoundMatches as $secondRoundMatch)
        @if($isFinalRound)
            <h5 class="font-bold">
                @if($secondRoundMatch->isThirdPlaceMatch($thirdPlaceMatchId))
                    <i class="fa fa-trophy fa-fw" style="color: saddlebrown"></i>
                    Third place match
                @elseif($secondRoundMatch->isFirstPlaceMatch($firstPlaceMatchId))
                    <i class="fa fa-trophy fa-fw" style="color: gold"></i>
                    FINAL
                @endif
            </h5>
        @endif
        @if(Auth::user()->isOrganizer() && $tournament->isYourTournament() && $tournament->isOngoing())
            <div class="form-group">
                <div class="input-container">
                    <input id="match-start-date-and-time" type="text" href="{{ route('match-update', $secondRoundMatch->id) }}"
                           name="start_date_and_time" placeholder="match date"
                           class="inline-input-width start-date-and-time match-detail"
                           value="{{ $secondRoundMatch->start_date_and_time ?
                            \Carbon\Carbon::parse($secondRoundMatch->start_date_and_time)->format('d/m/Y H:i') : '' }}">
                </div>
            </div>
        @else
            <h5 class="font-bold" style="color: darkred">
                <i class="fa fa-clock-o fa-fw"></i>
                @if($secondRoundMatch->hasStartDateAndTime())
                    {{ \Carbon\Carbon::parse($secondRoundMatch->start_date_and_time)->format('d/m/Y H:i') }}
                @else
                    ---
                @endif
            </h5>
        @endif
        <h6>
            <img src="{{ asset($secondRoundMatch->getFirstClub()->emblem_dir. $secondRoundMatch->getFirstClub()->emblem) }}"
                 width="60" height="60" class="img-fluid rounded-circle">
            {{ $secondRoundMatch->getFirstClub()->name}}
            <span class="font-bold">vs</span>
            {{ $secondRoundMatch->getSecondClub()->name}}
            <img src="{{ asset($secondRoundMatch->getSecondClub()->emblem_dir. $secondRoundMatch->getSecondClub()->emblem) }}"
                 width="60" height="60" class="img-fluid rounded-circle">
        </h6>
        @if(Auth::user()->isOrganizer() && $tournament->isYourTournament() && $tournament->isOngoing())
            <div class="form-group" style="margin-top: -20px">
                <div class="input-container">
                    <span class="badge my-color-3">
                        <input id="match-result-first-club" type="number" href="{{ route('match-update', $secondRoundMatch->id) }}"
                               name="result_first_club" class="inline-input-result-width match-detail"
                               value="{{ $secondRoundMatch->result_first_club }}" min="0" style="height: 18px; color: white">:
                        <input id="match-result-second-club" type="number" href="{{ route('match-update', $secondRoundMatch->id) }}"
                               name="result_second_club" class="inline-input-result-width match-detail"
                               value="{{ $secondRoundMatch->result_second_club }}" min="0" style="height: 18px; color: white">
                    </span>
                </div>
            </div>
        @else
            <h5 class="font-bold" style="margin-top: -20px">
                <span class="badge badge-pill my-color-3">
                    @if($secondRoundMatch->hasResults())
                        {{ $secondRoundMatch->result_first_club }} : {{ $secondRoundMatch->result_second_club }}
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
        {{ $secondRoundMatches->links('layouts.pagination.matches.list') }}
    </div>
</div>