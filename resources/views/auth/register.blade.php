@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Register</h2>
        </div>
        <div class="panel-body">
          <img src="https://static1.squarespace.com/static/536c52bee4b0f62cfc1b78f2/536c5e81e4b09724c1080aee/555e65c5e4b0777b1da606c4/1432249798096/blank+logo.png" height="100px" width="150px" class='img-responsive center-block' style='padding-bottom:15px' alt='Logo'>
          <form role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <fieldset>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <input id="name" type="text" placeholder="Name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">

                <input id="mobile" type="text" placeholder="Australian mobile starts with 04" class="form-control" name="mobile" value="{{ old('mobile') }}" required>

                @if ($errors->has('mobile'))
                <span class="help-block">
                  <strong>{{ $errors->first('mobile') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">

                <input id="street" type="text" placeholder="Street" class="form-control" name="street" value="{{ old('street') }}" required>

                @if ($errors->has('street'))
                <span class="help-block">
                  <strong>{{ $errors->first('street') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">

                <input id="city" type="text" placeholder="City" class="form-control" name="city" value="{{ old('city') }}" required>

                @if ($errors->has('city'))
                <span class="help-block">
                  <strong>{{ $errors->first('city') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group">

                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
              </div>

              <div class="form-group">
                <button name='register' type="submit" class="btn btn-lg btn-primary btn-block">
                  Register
                </button>
              </div>
              <div class="form-group">
                <div style="padding-top:10px; font-size:85%" >
                  Don't have an account?
                  <a href="{{ route('login') }}">
                    Sign Up Here
                  </a>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
