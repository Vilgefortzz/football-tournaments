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
                    <label for="club-name">Club name</label>
                </div>
            </div>
            <h3 class="font-italic"><i class="fa fa-shield fa-fw"></i>
                Choose emblem for the club
            </h3>
            <h5 class="font-italic">
                ( you can change it later in club profile )
            </h5>
            <div class="form-group">
                <input id="club-emblem" type="file" name="club_emblem">
            </div>
            <br>
            <div class="form-group">
                <button class="btn my-color" type="submit">Create a new club</button>
            </div>
        </div>
    </div>

    <div class="col text-center">
        <div class="jumbotron jumbotron-main-page">
            <h1 class="font-italic"><i class="fa fa-map fa-fw my-color-2"></i>Localization</h1>
            <hr>
            <br>
            <h3 class="font-italic"><i class="fa fa-flag fa-fw"></i> Choose country:</h3>
            <h5 class="font-italic">
                ( this is important to find your club in search ! )
            </h5>
            <div class="form-group text-center">
                <div class="input-container" style="padding: 10px 60px">
                    <input type="text" id="club-country" name="country"
                           required style="text-align: center">
                    <label for="club-country">Club country</label>
                </div>
            </div>
            <h3 class="font-italic"><i class="fa fa-flag-o fa-fw"></i> Choose city:</h3>
            <h5 class="font-italic">
                ( this is important to find your club in search ! )
            </h5>
            <div class="form-group text-center">
                <div class="input-container" style="padding: 10px 60px">
                    <input type="text" id="club-city" name="city"
                           required autofocus style="text-align: center">
                    <label for="club-city">Club city</label>
                </div>
            </div>
        </div>
    </div>
</form>