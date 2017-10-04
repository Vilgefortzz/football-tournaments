@foreach($clubs as $club)
    <div id="club-{{$club->id}}" class="tile tile-clubs club-card"
         href="#">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <div class="info-header animate-text">
            <a href="{{ route('contract-destroy', $club->id) }}"
               class="btn btn-circle my-color delete-contract" role="button"><i class="fa fa-remove"></i></a>

            <div class="pull-right" style="font-size: 10px">
                <i class="fa fa-calendar fa-fw"></i>{{ $club->created_at }}
            </div>
        </div>
        <h1 class="text-header text-center">
            <img src="{{ asset($club->emblem_dir. $club->emblem) }}"
                 width="150" height="150">
        </h1>
        <h1 class="text-header text-center">
            {{ $club->name }}
        </h1>
        <h1 class="text-header text-center">
            <img src="{{ asset($club->emblem_dir. $club->emblem) }}"
                 width="60" height="60">
        </h1>
        <div class="text-contracts text-center">
        </div>
    </div>
@endforeach
<div class="container pagination-links">
    <div class="row justify-content-center">
        {{ $clubs->links('layouts.pagination.clubs.searchable-cards') }}
    </div>
</div>