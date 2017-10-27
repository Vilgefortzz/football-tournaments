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
                             width="130" height="130" class="img-fluid rounded-circle">
                    </h1>
                    <h1 class="text-header text-center">
                        {{ $contract->user->username }}
                    </h1>
                    <h1 class="text-header text-center">
                        <i class="fa fa-file-text fa-lg"></i>
                    </h1>
                    <h6 class="text-center animate-text font-italic">
                        {{$remainingContractsDuration[$contract->id]}}
                    </h6>
                    <div class="text-join-requests text-center animate-text">
                        Extended contract duration:
                        <div class="styled-select my-color rounded">
                            <select id="duration-contract-{{$contract->id}}">
                                <option value="1" selected="selected">1 week</option>
                                <option value="2">2 weeks</option>
                                <option value="3">1 month</option>
                                <option value="4">2 months</option>
                            </select>
                        </div>

                        <input type="text" id="username-contract-{{$contract->id}}">
                        <label class="font-italic"
                               for="username-contract-{{$contract->id}}">Make your signature</label>
                        <div class="bar"></div>

                        <a href="{{ route('contract-propose-extension', $contract->id) }}"
                           class="btn btn-sm my-color-3 propose-extend-contract" data-contract-id="{{$contract->id}}">
                            <i class="fa fa-handshake-o fa-lg fa-fw"></i>  Propose extension
                        </a>
                    </div>
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
