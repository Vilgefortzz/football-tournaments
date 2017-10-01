@extends('layouts.app')

@section('content')

    <div href="{{ route('user-contracts-binding', Auth::user()->id) }}" class="contract-binding" hidden></div>

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content" class="row justify-content-center">
        @if($contracts->isEmpty())
            @include('layouts.elements.contract-info')
        @else
            @foreach($contracts as $contract)
                <div id="contract-{{$contract->id}}" class="tile tile-contracts contract-card"
                     href="{{ route('user-contracts-created', Auth::user()->id) }}">
                    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                    <div class="info-header animate-text">
                        <a href="{{ route('contract-destroy', $contract->id) }}"
                           class="btn btn-circle my-color delete-contract" role="button"><i class="fa fa-remove"></i></a>

                        <div class="pull-right" style="font-size: 10px">
                            <i class="fa fa-calendar fa-fw"></i>{{ $contract->created_at }}
                        </div>
                    </div>
                    <h1 class="text-header text-center"><i class="fa fa-file-text fa-5x"></i></h1>
                    <h1 class="text-header text-center">
                        {{ $contract->club->name }}
                    </h1>
                    <h1 class="text-header text-center">
                        <img src="{{ asset($contract->club->emblem_dir. $contract->club->emblem) }}"
                             width="60" height="60">
                    </h1>
                    <div class="text-contracts text-center">
                        <h5 class="animate-text">
                            <input type="text" id="username-contract-{{$contract->id}}" name="username">
                            <label class="font-italic" for="username-contract-{{$contract->id}}">Make your signature</label>
                            <div class="bar"></div>
                        </h5>

                        <h6 class="animate-text">
                            <a href="{{ route('contract-sign', $contract->id) }}"
                               class="btn my-color sign-contract" data-contract-id="{{$contract->id}}">
                                <i class="fa fa-pencil fa-lg fa-fw"></i>Sign contract:
                            </a>
                        </h6>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="container pagination-links">
            <div class="row justify-content-center">
                {{ $contracts->links('layouts.pagination.contracts.default') }}
            </div>
        </div>
    </div>

@endsection
