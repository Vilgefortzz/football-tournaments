@extends('layouts.app')

@section('content')

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content-search" class="row justify-content-center"></div>
    <div id="content" class="row justify-content-center">
        <form id="profile-form" class="row" enctype="multipart/form-data" method="POST" action="{{ route('club-store') }}">
            {{ csrf_field() }}

            <div class="col text-center">
                <div class="jumbotron jumbotron-main-page">
                    <h1 class="font-italic"><i class="fa fa-soccer-ball-o fa-fw my-color-2"></i>Create club</h1>
                    <hr>
                    <br>
                    <h3 class="font-italic"><i class="fa fa-users fa-fw"></i> Choose club name:</h3>
                    <div class="form-group">
                        <div class="input-container" style="padding: 10px 60px">
                            <input type="text" id="club-name" name="name"
                                   required autofocus style="text-align: center">
                        </div>
                    </div>
                    <h3 class="font-italic"><i class="fa fa-shield fa-fw"></i>
                        Choose emblem for the club
                    </h3>
                    <p class="font-italic">( you can change it later in club profile )</p>
                    <div class="form-group">
                        <input id="club-emblem" type="file" name="club_emblem">
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn my-color" type="submit">
                            <i class="fa fa-hand-o-right"></i>
                            Create a new club
                            <i class="fa fa-hand-o-left"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col text-center">
                <div class="jumbotron jumbotron-main-page">
                    <h1 class="font-italic"><i class="fa fa-map fa-fw my-color-2"></i>Localization</h1>
                    <hr>
                    <br>
                    <h3 class="font-italic"><i class="fa fa-flag fa-fw"></i> Choose country:</h3>
                    <p class="font-italic">( use fully name or code, make it possible to find club )
                        <br>
                        <span style="color: darkred">Cannot be updated later !</span>
                    </p>
                    <div class="form-group text-center">
                        <div class="input-container" style="padding: 10px 60px">
                            <input type="text" id="club-country" name="country"
                                   required style="text-align: center">
                        </div>
                    </div>
                    <h3 class="font-italic"><i class="fa fa-flag-o fa-fw"></i> Choose city:</h3>
                    <p class="font-italic">( use fully name or code, make it possible to find club )
                        <br>
                        <span style="color: darkred">Cannot be updated later !</span>
                    </p>
                    <div class="form-group text-center">
                        <div class="input-container" style="padding: 10px 60px">
                            <input type="text" id="club-city" name="city"
                                   required autofocus style="text-align: center">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection