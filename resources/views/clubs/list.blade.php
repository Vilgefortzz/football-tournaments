@extends('layouts.app')

@section('content')

    <div href="{{ route('user-contracts-binding', Auth::user()->id) }}" class="contract-binding" hidden></div>
    <div href="{{ route('user-contracts-created', Auth::user()->id) }}" class="contracts-created" hidden></div>

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content-search" class="row justify-content-center">
        @include('layouts.elements.clubs.search.search')
    </div>
    <div id="content" class="row justify-content-center">
        <div class="col-md-10">
            <div class="jumbotron jumbotron-main-page table-jumbotron">
                <div class="container pagination-links">
                    <div class="row justify-content-center">
                        {{ $clubs->links('layouts.pagination.clubs.list') }}
                    </div>
                </div>
                <table id="clubs-table" class="table table-hover table-responsive" cellspacing="0" width="100%">
                    <thead class="my-color-2">
                    <tr>
                        <th><i class="fa fa-users fa-fw"></i>Name</th>
                        <th><i class="fa fa-shield fa-fw"></i>Emblem</th>
                        <th><i class="fa fa-flag fa-fw"></i>Country</th>
                        <th><i class="fa fa-flag-o fa-fw"></i>City</th>
                        <th><i class="fa fa-star fa-fw"></i>Tournament points</th>
                        <th><i class="fa fa-trophy fa-fw"></i>Trophies</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($clubs as $club)
                        <tr>
                            <td class="font-bold">{{ $club->name }}</td>
                            <td>
                                <img src="{{ asset($club->emblem_dir. $club->emblem) }}"
                                     width="25" height="25">
                            </td>
                            <td class="font-bold">{{ $club->country }}</td>
                            <td class="font-bold">{{ $club->city }}</td>
                            <td class="font-bold">{{ $club->tournament_points }}</td>
                            <td class="font-bold">{{ $club->won_trophies }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection