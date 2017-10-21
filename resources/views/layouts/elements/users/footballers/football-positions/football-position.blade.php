<a href="{{ route('user-football-position-delete', [Auth::user()->id, $footballPosition->id]) }}"
   data-football-position-id="{{$footballPosition->id}}"
   class="badge badge-pill my-color-3 delete-football-position" role="button">
    <span>{{ $footballPosition->name }}</span>
    <i class="fa fa-remove"></i>
</a>