@extends('layouts.app')

@section('content')

    <div href="{{ route('user-contracts-binding', Auth::user()->id) }}" class="contract-binding" hidden></div>
    <div href="{{ route('user-contracts-created', Auth::user()->id) }}" class="contracts-created" hidden></div>
    @if(Auth::user()->isClubPresident())
        <div href="{{ route('club-join-requests', Auth::user()->club->id) }}" class="requests-to-join-the-club" hidden></div>
        <div href="{{ route('footballers-list-search') }}" class="footballers-list" hidden></div>
    @endif

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content-search" class="row justify-content-center"></div>
    <div id="content" class="row justify-content-center"></div>

@endsection
