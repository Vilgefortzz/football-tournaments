@extends('layouts.app')

@section('scripts')

    <script src="{{ asset('js/date-time-pickers/start-end-date.js') }}" type="text/javascript"></script>

@endsection

@section('content')

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content-search" class="row justify-content-center">
        @include('layouts.elements.tournaments.search.search')
    </div>
    <div id="content" class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-main-page table-jumbotron">
                <div class="container pagination-links">
                    <div class="row justify-content-center">
                        {{ $tournaments->links('layouts.pagination.tournaments.list') }}
                    </div>
                </div>
                <table id="tournaments-table" class="table table-hover table-responsive" cellspacing="0" width="100%">
                    <thead class="my-color-2">
                    <tr>
                        <th><i class="fa fa-trophy fa-fw"></i>Name</th>
                        <th><i class="fa fa-clock-o fa-fw"></i>Start date</th>
                        <th><i class="fa fa-clock-o fa-fw"></i>End date</th>
                        <th><i class="fa fa-flag fa-fw"></i>Country</th>
                        <th><i class="fa fa-flag-o fa-fw"></i>City</th>
                        <th><i class="fa fa-star fa-fw"></i>Tournament points</th>
                        <th><i class="fa fa-users fa-fw"></i>Available seats</th>
                        <th><i class="fa fa-unlock-alt fa-fw"></i>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($tournaments as $tournament)
                        <tr href="{{ route('tournament-show', $tournament->id) }}" class="dynamic-content">
                            <td class="font-bold">{{ $tournament->name }}</td>
                            <td class="font-bold">{{ \Carbon\Carbon::parse($tournament->start_date)->format('d/m/Y') }}</td>
                            <td class="font-bold">{{ \Carbon\Carbon::parse($tournament->end_date)->format('d/m/Y') }}</td>
                            <td class="font-bold">{{ $tournament->country }}</td>
                            <td class="font-bold">{{ $tournament->city }}</td>
                            <td class="font-bold">{{ $tournament->tournament_points }}</td>
                            <td class="font-bold">{{ $tournament->number_of_available_seats }}</td>
                            <td class="font-bold">{{ $tournament->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection