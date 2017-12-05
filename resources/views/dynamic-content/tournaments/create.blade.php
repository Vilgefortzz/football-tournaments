<form class="col-md-8 text-center" enctype="multipart/form-data" method="POST" action="{{ route('tournament-store') }}">
    {{ csrf_field() }}

    <div class="jumbotron jumbotron-main-page">
        <h1 class="font-italic"><i class="fa fa-trophy fa-fw my-color-2"></i>Create tournament</h1>
        <br>
        <div class="process">
            <div class="process-row nav nav-tabs">
                <div class="process-step">
                    <button id="step-1" class="btn btn-circle-step my-color-3 active background" data-toggle="tab" href="#menu-1"
                            data-next-step-id="2">
                        <i class="fa fa-info fa-3x"></i>
                    </button>
                    <p><small>Basic info</small></p>
                </div>
                <hr class="horizontal-step-line">
                <div class="process-step">
                    <button id="step-2" class="btn btn-circle-step" data-toggle="tab" href="#menu-2"
                            data-previous-step-id="1" data-next-step-id="3" disabled>
                        <i class="fa fa-map-marker fa-3x"></i>
                    </button>
                    <p><small>Localization</small></p>
                </div>
                <hr class="horizontal-step-line">
                <div class="process-step">
                    <button id="step-3" class="btn btn-circle-step" data-toggle="tab" href="#menu-3"
                            data-previous-step-id="2" data-next-step-id="4" disabled>
                        <i class="fa fa-gamepad fa-3x"></i>
                    </button>
                    <p><small>Game system</small></p>
                </div>
                <hr class="horizontal-step-line">
                <div class="process-step">
                    <button id="step-4" role="button" class="btn btn-circle-step" data-toggle="tab" href="#menu-4"
                            data-previous-step-id="3" data-next-step-id="5" disabled>
                        <i class="fa fa-gift fa-3x"></i>
                    </button>
                    <p><small>Prizes</small></p>
                </div>
                <hr class="horizontal-step-line">
                <div class="process-step">
                    <button id="step-5" role="button" class="btn btn-circle-step" data-toggle="tab" href="#menu-5"
                            data-previous-step-id="4" disabled>
                        <i class="fa fa-check fa-3x"></i>
                    </button>
                    <p><small>Create tournament</small></p>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="menu-1" class="tab-pane active">
                <div class="form-group">
                    <div class="input-container">
                        <label for="tournament-name" class="font-bold inline-input-label">
                            <i class="fa fa-edit fa-fw"></i>Tournament name*:
                        </label>
                        <input id="tournament-name" type="text" name="name" class="inline-input-width">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-container" style="display: inline-block">
                        <label for="tournament-start-date" class="font-bold inline-input-label">
                            <i class="fa fa-clock-o fa-fw"></i>Start date*:
                        </label>
                        <input id="tournament-start-date" type="text" name="start_date"
                               class="inline-input-width start-date">
                        <div id="tournament-end-date-section" class="form-group" style="display: none">
                            <label for="tournament-end-date" class="font-bold inline-input-label">
                                <i class="fa fa-clock-o fa-fw"></i>End date*:
                            </label>
                            <input id="tournament-end-date" type="text" name="end_date"
                                   class="inline-input-width end-date">
                        </div>
                    </div>
                </div>

                <a role="button" class="btn my-color-3 next-step" data-next-step-id="2">Next <i class="fa fa-chevron-right"></i></a>
                <br>
                <div class="pull-right">
                    <p class="font-italic">*required field</p>
                </div>
            </div>
            <div id="menu-2" class="tab-pane">
                <div class="form-group">
                    <div class="input-container">
                        <label for="tournament-country" class="font-bold inline-input-label">
                            <i class="fa fa-flag fa-fw"></i>Tournament country*:
                        </label>
                        <input id="tournament-country" type="text" name="country" class="inline-input-width">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-container">
                        <label for="tournament-city" class="font-bold inline-input-label">
                            <i class="fa fa-flag-o fa-fw"></i>Tournament city*:
                        </label>
                        <input id="tournament-city" type="text" name="city" class="inline-input-width">
                    </div>
                </div>

                <a role="button" class="btn my-color prev-step" data-previous-step-id="1" data-current-step-id="2"><i class="fa fa-chevron-left"></i> Back</a>
                <a role="button" class="btn my-color-3 next-step" data-next-step-id="3">Next <i class="fa fa-chevron-right"></i></a>
                <br>
                <div class="pull-right">
                    <p class="font-italic">*required field</p>
                </div>
            </div>
            <div id="menu-3" class="tab-pane">
                <div class="form-group text-center">
                    <div class="input-container">
                        <div class="styled-select rounded">
                            <label for="tournament-number-of-seats" class="font-bold inline-input-label">
                                <i class="fa fa-users fa-fw"></i>Number of teams*:
                            </label>
                            <select id="tournament-number-of-seats" name="number_of_seats" required>
                                <option value="4" selected="selected">4</option>
                                <option value="8">8</option>
                                <option value="16">16</option>
                                <option value="32">32</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="input-container">
                        <div class="styled-select rounded">
                            <label for="tournament-game-system" class="font-bold inline-input-label">
                                <i class="fa fa-gamepad fa-fw"></i>Game system*:
                            </label>
                            <select id="tournament-game-system" name="game_system" required>
                                <option value="single elimination" selected="selected">Single elimination ( winner stays )</option>
                                <option value="everyone with each other">Everyone with each other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <a role="button" class="btn my-color prev-step" data-previous-step-id="2" data-current-step-id="3"><i class="fa fa-chevron-left"></i> Back</a>
                <a role="button" class="btn my-color-3 next-step" data-next-step-id="4">Next <i class="fa fa-chevron-right"></i></a>
                <br>
                <div class="pull-right">
                    <p class="font-italic">*required field</p>
                </div>
            </div>
            <div id="menu-4" class="tab-pane">
                <div class="form-group">
                    <div class="input-container">
                        <label for="tournament-points" class="font-bold inline-input-label">
                            <i class="fa fa-money fa-fw"></i>Number of tournament points*:
                        </label>
                        <input id="tournament-points" type="number" name="tournament_points" class="inline-input-width" min="0" style="text-align: center">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-container">
                        <label for="tournament-prize-for-first-place" class="font-bold inline-input-label">
                            <i class="fa fa-trophy fa-fw" style="color: gold"></i>Prize for first place:
                        </label>
                        <input id="tournament-prize-for-first-place" type="text" name="prize_first_place" class="inline-input-width">
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="input-container">
                        <label for="tournament-prize-for-second-place" class="font-bold inline-input-label">
                            <i class="fa fa-trophy fa-fw" style="color: silver"></i>Prize for second place:
                        </label>
                        <input id="tournament-prize-for-second-place" type="text" name="prize_second_place" class="inline-input-width">
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="input-container">
                        <label for="tournament-prize-for-third-place" class="font-bold inline-input-label">
                            <i class="fa fa-trophy fa-fw" style="color: saddlebrown"></i>Prize for third place:
                        </label>
                        <input id="tournament-prize-for-third-place" type="text" name="prize_third_place" class="inline-input-width">
                    </div>
                </div>

                <a role="button" class="btn my-color prev-step" data-previous-step-id="3" data-current-step-id="4"><i class="fa fa-chevron-left"></i> Back</a>
                <a role="button" class="btn my-color-3 next-step" data-next-step-id="5">Next <i class="fa fa-chevron-right"></i></a>
                <br>
                <div class="pull-right">
                    <p class="font-italic">*required field</p>
                </div>
            </div>
            <div id="menu-5" class="tab-pane">

                <button type="submit" class="btn btn-lg my-color-3" href="{{ route('tournament-store') }}">
                    <i class="fa fa-trophy" style="color: gold"></i>
                    Create tournament
                    <i class="fa fa-trophy" style="color: gold"></i>
                </button>
                <br>
                <a role="button" class="btn my-color prev-step" data-previous-step-id="4" data-current-step-id="5"><i class="fa fa-chevron-left"></i> Back</a>
            </div>
        </div>
    </div>
</form>