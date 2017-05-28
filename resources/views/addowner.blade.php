@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Add New Owner
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Add new owner here
        </div>
        <div class="panel-body">
          @if (Session::has('success'))
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('success') }}
          </div>
          @endif
          <form id="addowner" role="form" method="POST" action="{{ route('create_owner') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('business') ? ' has-error' : '' }}">
              <select id="business" name="business" class="form-control" placeholder="Business" required>
                <option value="">Select Business</option>

                @foreach ($businesses as $business)
                <option value="{{ $business->id }}">{{ $business->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Name</h5>
              <input id="name" type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required autofocus>

              @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Email</h5>
              <input id="email" type="email" placeholder="Email"   class="form-control" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Mobile</h5>
              <input id="mobile" type="number" placeholder="Mobile"   class="form-control" name="mobile" value="{{ old('mobile') }}" required>

              @if ($errors->has('mobile'))
              <span class="help-block">
                <strong>{{ $errors->first('mobile') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Street</h5>
              <input id="street" type="text" placeholder="Street"  class="form-control" name="street" value="{{ old('street') }}" required>

              @if ($errors->has('street'))
              <span class="help-block">
                <strong>{{ $errors->first('street') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>City</h5>
              <input id="city" type="text" placeholder="City"  class="form-control" name="city" value="{{ old('city') }}" required>

              @if ($errors->has('city'))
              <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <h5>Password</h5>
              <input id="password" type="password" placeholder="Password" class="form-control" name="password"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>

              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group">
              <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
            </div>

          <div id="decide">
            <!--<button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-times"></i></button>-->
            <span><button type="submit" name="submit" class="btn btn-warning btn-circle btn-lg center-block"><i class="fa fa-check"></i></button></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
