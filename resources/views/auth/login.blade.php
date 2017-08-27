@extends('layouts.app')

@section('content')
<div class="container navbar-margin">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <!-- Form login -->
            <form method="POST" action="{{ route('login') }}">
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

                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>

                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Login</button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="pull-right">
                        <a href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
