@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Login</h2>
        </div>
        <div class="panel-body">
          <img src="https://static1.squarespace.com/static/536c52bee4b0f62cfc1b78f2/536c5e81e4b09724c1080aee/555e65c5e4b0777b1da606c4/1432249798096/blank+logo.png" height="100px" width="150px" class='img-responsive center-block' style='padding-bottom:15px' alt='Logo'>
          <form role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <fieldset>
<<<<<<< HEAD
              @if (Request::is('login'))
              <div class="form-group{{ $errors->has('business') ? ' has-error' : '' }}">
                <select id="business" name="business" class="form-control" placeholder="Business" required>
                  <option value="">Select Business</option>

                  @foreach ($businesses as $business)
                  <option value="{{ $business->id }}">{{ $business->name }}</option>
                  @endforeach
                </select>
              </div>
              @endif
=======
              <div id="selectBusiness" class="form-group">
                <select id="businessName"  class="form-control">
                                                <option disabled selected hidden>Select Business</option>
                                                <option>Hair Salon</option>
                                                <option>Happy Gym</option>
                </select>
              </div>
>>>>>>> sept-laravel

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
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
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                  </label>
                </div>
              </div>

              <div class="form-group">
                <button name='login' type="submit" class="btn btn-lg btn-success btn-block">
                  Login
                </button>
              </div>
              <div class="form-group">
                <div style="padding-top:10px; font-size:85%" >
                  Don't have an account?
                  <a href="{{ route('register') }}">
                    Sign Up Here
                  </a>
                </div>
              </div>
              <!--
              <a class="btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
              </a>
              -->
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
