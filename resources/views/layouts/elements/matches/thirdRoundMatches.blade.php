<div class="matches-list">
    @foreach($thirdRoundMatches as $thirdRoundMatch)
        @if($isFinalRound)
            <h5 class="font-bold">
                @if($thirdRoundMatch->isThirdPlaceMatch($thirdPlaceMatchId))
                    <i class="fa fa-trophy fa-fw" style="color: saddlebrown"></i>
                    Third place match
                @elseif($thirdRoundMatch->isFirstPlaceMatch($firstPlaceMatchId))
                    <i class="fa fa-trophy fa-fw" style="color: gold"></i>
                    FINAL
                @endif
            </h5>
        @endif
        <h5 class="font-bold" style="color: darkred">
            <i class="fa fa-clock-o fa-fw"></i>
            @if($thirdRoundMatch->hasStartDateAndTime())
                {{ \Carbon\Carbon::parse($thirdRoundMatch->start_date_and_time)->format('d/m/Y H:i') }}
            @else
                ---
            @endif
        </h5>
        <h6>
            <img src="{{ asset($thirdRoundMatch->first_club_emblem_dir. $thirdRoundMatch->first_club_emblem) }}"
                 width="60" height="60" class="img-fluid rounded-circle">
            {{ $thirdRoundMatch->first_club}}
            <span class="font-bold">vs</span>
            {{ $thirdRoundMatch->second_club}}
            <img src="{{ asset($thirdRoundMatch->second_club_emblem_dir. $thirdRoundMatch->second_club_emblem) }}"
                 width="60" height="60" class="img-fluid rounded-circle">
        </h6>
        <h5 class="font-bold" style="margin-top: -20px">
            <span class="badge badge-pill my-color-3">
                @if($thirdRoundMatch->hasResults())
                    {{ $thirdRoundMatch->result_first_club }} : {{ $thirdRoundMatch->result_second_club }}
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
        {{ $thirdRoundMatches->links('layouts.pagination.matches.list') }}
    </div>
</div>