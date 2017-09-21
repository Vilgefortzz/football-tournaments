@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="wrap">
            <div class="container">
                <div id="divLoading"></div>
                <div id="content" class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="jumbotron jumbotron-main-page">
                            <div class="row justify-content-center">

                                <div class="col">
                                    <form id="profile-form" enctype="multipart/form-data" method="POST" action="{{ route('club-store') }}">
                                        {{ csrf_field() }}

                                        <h1 class="font-italic"><i class="fa fa-soccer-ball-o fa-fw"></i>Create club</h1>
                                        <hr>
                                        <br>

                                        <h3 class="font-italic"><i class="fa fa-users fa-fw"></i> Choose club name:</h3>
                                        <div class="form-group">
                                            <div class="input-container">
                                                <input type="text" id="club-name" name="club_name" required autofocus>
                                                <label for="club-name">Club name</label>
                                            </div>
                                        </div>
                                        <h3 class="font-italic"><i class="fa fa-shield fa-fw"></i>
                                            Choose emblem for club ( you can change it later in club profile ):</h3>
                                        <div class="form-group">
                                            <input id="club-emblem" type="file" name="club_emblem">
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <button class="btn my-button" type="submit">Create a new club</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection