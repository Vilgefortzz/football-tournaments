@extends('layouts.app')

@section('content')

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content-search" class="row justify-content-center"></div>
    <div id="content" class="row justify-content-center">
        @if($contracts->isEmpty())
            @include('layouts.elements.contracts.contract-info')
        @else
            @foreach($contracts as $contract)
                <div id="contract-{{$contract->id}}" class="tile tile-contracts contract-card">
                    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                    <div class="info-header animate-text">

                        <div style="font-size: 10px">
                            <i class="fa fa-calendar fa-fw"></i>{{ $contract->created_at }}
                        </div>
                    </div>
                    <br>
                    <h1 class="text-header text-center">
                        <img src="{{ asset($contract->user->avatar_dir. $contract->user->avatar) }}"
                             width="150" height="150" class="img-fluid rounded-circle">
                    </h1>
                    <h1 class="text-header text-center">
                        {{ $contract->user->username }}
                    </h1>
                    <h1 class="text-header text-center">
                        <i class="fa fa-clock-o fa-lg"></i>
                    </h1>
                    <h1 class="text-header text-center font-italic my-color-3">
                        {{$remainingContractsDuration[$contract->id]}}
                    </h1>
                    <h1 class="text-header text-center">
                        <i class="fa fa-plus fa-lg"></i>
                        <i class="fa fa-file-text fa-lg"></i>
                    </h1>
                    <h1 class="text-header text-center font-italic my-color">
                        + {{ $contract->extended_duration }}
                    </h1>
                </div>
            @endforeach
            <div class="container pagination-links">
                <div class="row justify-content-center">
                    {{ $contracts->links('layouts.pagination.contracts.default') }}
                </div>
            </div>
        @endif
    </div>

@endsection
