@extends('layouts.app')

@section('scripts')

    <script src="{{ asset('js/main-page.js') }}" type="text/javascript"></script>

@endsection

@section('content')

    <div class="row justify-content-center">

        <div class="col">
            <div class="jumbotron">
                <h1 class="h1-responsive">
                    <img src="{{ asset('images/flames.jpg') }}" height="150" class="d-inline-block align-top" alt="" style="float: left">
                </h1>
                <p class="lead font-italic">"Create tournaments, join the club,
                    take part in tournaments, sign contracts
                    but foremost meet other people to together lead your club to victory and win trophies with it."
                </p>
                <hr class="my-4">

                <div class="row">
                    <div class="col-sm-6 col-md-4 thumbnail-margin">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3 class="text-center">
                                    <i class="fa fa-address-card-o"></i>
                                    Organizer or footballer
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3 class="text-center">
                                    <i class="fa fa-calendar"></i>
                                    Create tournaments
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3 class="text-center">
                                    <i class="fa fa-bar-chart"></i>
                                    See your stats
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 thumbnail-margin">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3 class="text-center">
                                    <i class="fa fa-globe"></i>
                                    Get notifications about events
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3 class="text-center">
                                    <i class="fa fa-soccer-ball-o"></i>
                                    Play matches, win trophies
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3 class="text-center">
                                    <i class="fa fa-users"></i>
                                    Join the club, meet together, play together
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">
                <div class="copy-text">
                    Created by
                    <a href="https://github.com/Vilgefortzz">Grzegorz Klimek</a>
                </div>
                <div class="copy-text">
                    <i class="fa fa-copyright"></i> 2017
                </div>
            </div>
        </div>

        <div class="col">
            <div class="container container-login-panel">
                <div class="card">
                    <h1 class="title"><i class="fa fa-soccer-ball-o"></i> Sign in</h1>

                    <!-- Form login -->
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

                            <div class="input-container">
                                <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
                                <label for="username">Username</label>
                                <div class="bar"></div>
                            </div>

                            @if ($errors->has('username'))
                                <div class="input-container">
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                                </div>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-container">
                                <input type="password" id="password" name="password" required>
                                <label for="password">Password</label>
                                <div class="bar"></div>
                            </div>

                            @if ($errors->has('password'))
                                <div class="input-container">
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox checkbox-login">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="button-container">
                                <button type="submit"><span>Login</span></button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="footer">
                                <a href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card alt">
                    <div class="toggle"></div>
                    <h1 class="title">Register
                        <div class="close"></div>
                    </h1>

                    <!-- Form register -->
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <div class="input-container">
                                <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
                                <label for="username">Your username</label>
                                <div class="bar"></div>
                            </div>

                            @if ($errors->has('username'))
                                <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-container">
                                <input type="password" id="password" name="password" required>
                                <label for="password">Your password</label>
                                <div class="bar"></div>
                            </div>

                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="input-container">
                                <input type="password" id="password-confirm" name="password_confirmation" required>
                                <label for="password-confirm">Confirm Password</label>
                                <div class="bar"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="button-container">
                                <button type="submit"><span>Register</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection