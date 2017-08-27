@extends('layouts.app')

@section('content')
<div class="container navbar-margin">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <!-- Form register -->
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <p class="h5 text-center mb-4">Sign in</p>

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" required autofocus>
                        <label for="username">Your username</label>
                    </div>

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>


                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" id="password" name="password" class="form-control" required>
                        <label for="password">Your password</label>
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required>
                        <label for="password-confirm">Confirm Password</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
