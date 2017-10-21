<a href="{{ route('user-football-position-delete', [Auth::user()->id, $userFootballPosition->id]) }}"
   class="badge badge-pill my-color-3 delete-football-position" role="button">
    <span>{{ $userFootballPosition->name }}</span>
    <i class="fa fa-remove"></i>
</a>