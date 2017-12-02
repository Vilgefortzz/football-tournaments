<div class="matches-list">
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
        <h5 class="font-bold" style="color: darkred">
            <i class="fa fa-clock-o fa-fw"></i>
            @if($secondRoundMatch->hasStartDateAndTime())
                {{ \Carbon\Carbon::parse($secondRoundMatch->start_date_and_time)->format('d/m/Y H:i') }}
            @else
                ---
            @endif
        </h5>
        <h6>
            <img src="{{ asset($secondRoundMatch->first_club_emblem_dir. $secondRoundMatch->first_club_emblem) }}"
                 width="60" height="60" class="img-fluid rounded-circle">
            {{ $secondRoundMatch->first_club}}
            <span class="font-bold">vs</span>
            {{ $secondRoundMatch->second_club}}
            <img src="{{ asset($secondRoundMatch->second_club_emblem_dir. $secondRoundMatch->second_club_emblem) }}"
                 width="60" height="60" class="img-fluid rounded-circle">
        </h6>
        <h5 class="font-bold" style="margin-top: -20px">
            <span class="badge badge-pill my-color-3">
                @if($secondRoundMatch->hasResults())
                    {{ $secondRoundMatch->result_first_club }} : {{ $secondRoundMatch->result_second_club }}
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
        {{ $secondRoundMatches->links('layouts.pagination.matches.list') }}
    </div>
</div>