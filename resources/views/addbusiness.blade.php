@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Add New Business
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Add new business here
        </div>
        <div class="panel-body">
          @if (Session::has('success'))
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('success') }}
          </div>
          @endif
          <form id="addbusiness" role="form" method="POST" action="{{ route('create_business') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Name</h5>
              <input id="name" type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required autofocus>

              @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Contact</h5>
              <input id="mobile" type="number" placeholder="Contact"   class="form-control" name="mobile" value="{{ old('mobile') }}" required>

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

            <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}" style="text-align:left;">
              <strong>Start Time : </strong>
              <div class='input-group date datetimepicker3'>
                <input type='text' class="form-control" name="start" value="{{ old('start') }}" required/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>
              @if ($errors->has('start'))
              <span class="help-block">
                <strong>{{ $errors->first('start') }}</strong>
              </span>
              @endif
            </div>

            <strong>End Time : </strong>
            <div class='input-group date datetimepicker3'>
              <input type='text' class="form-control" name="end" value="{{ old('end') }}" required/>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
              </span>
            </div>
          </div>

          <div id="decide">
            <!--<button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-times"></i></button>-->
            <span><button type="submit" name="submit" class="btn btn-warning btn-circle btn-lg center-block"><i class="fa fa-check"></i></button></span>
          </div>
        </form>
        <script type="text/javascript">
        $(function () {
          $('.datetimepicker3').datetimepicker({
            format: 'HH:mm',
            stepping: 30
          });
        });
        </script>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
