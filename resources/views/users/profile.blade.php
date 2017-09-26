@extends('layouts.app')

@section('content')

    <div href="{{ route('user-contracts-binding', Auth::user()->id) }}" class="contract-binding" hidden></div>

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content" class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-main-page">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="tile chosen">
                            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                            <h1 class="info-header">
                                <a id="delete-account" data-toggle="modal" data-target="#delete-account-modal"
                                   class="btn btn-circle btn-danger" role="button"><i class="fa fa-trash"></i></a>
                            </h1>
                            <div class="text text-center">
                                <h1>Your profile</h1>
                                <h1><img src="{{ asset($user->avatar_dir. $user->avatar) }}"
                                         width="100" height="100" class="img-fluid rounded-circle"></h1>
                                <br>
                                <h5 class="font-italic">Since from: </h5>
                                <h6>{{ $user->created_at }}</h6>
                                <br>
                                <h5 class="font-italic">Current club: </h5>
                                @if($user->haveClub())
                                    <h6><img src="{{ asset($user->club->emblem_dir. $user->club->emblem) }}"
                                             width="30" height="30"></h6>
                                    <h6>{{ $user->club->name }}</h6>
                                @else
                                    <h6>You don't belong to any club</h6>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <form id="profile-form" enctype="multipart/form-data" method="POST"
                              action="{{ route('user-update', Auth::user()->id) }}">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <h3 class="font-italic">Update profile image</h3>
                            <div class="form-group">
                                <img src="{{ asset($user->avatar_dir. $user->avatar) }}"
                                     width="120" height="120" class="img-fluid rounded-circle">
                                <input id="avatar" type="file" name="avatar">
                            </div>
                            <br>
                            <h3 class="font-italic">Change password</h3>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-container">
                                    <input type="password" id="password" name="password">
                                    <label for="password">Password</label>
                                    <div class="bar"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-container">
                                    <input type="password" id="password-confirm" name="password_confirmation">
                                    <label for="password-confirm">Confirm Password</label>
                                    <div class="bar"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn my-button" type="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.elements.delete-account-modal')

@endsection