@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="wrap">
            <div class="container">
                <div id="divLoading"></div>
                <div id="content" class="row justify-content-center">
                    @foreach($contracts as $contract)
                        <div class="tile tile-contracts">
                            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                            <button type="button" class="btn btn-circle btn-danger delete-button">
                                <i class="fa fa-remove"></i>
                            </button>
                            <h1 class="text-header text-center">Contract(#{{ $contract->id }})</h1>
                            <div class="text-contracts text-center">
                                <h1><i class="fa fa-file-text fa-4x"></i></h1>
                                <p class="animate-text"><i class="fa fa-calendar fa-lg fa-fw"></i>{{ $contract->created_at }}</p>
                                <h2 class="animate-text">
                                    <img src="{{ asset('images/clubs/'. $contract->club->logo) }}" width="60" height="60">
                                </h2>
                                <h2 class="animate-text">
                                    {{ $contract->club->name }}
                                </h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
