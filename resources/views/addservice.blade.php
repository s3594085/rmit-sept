@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Add New Services
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Add new service here
        </div>
        <div class="panel-body">
          @if (Session::has('success'))
          <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              {{ Session::get('success') }}
          </div>
          @endif
          <form role="form" method="POST" action="{{ route('create_services') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Service Name</h5>
              <input id="name" type="text" name="name" placeholder="Service Name" class="form-control" value="{{ old('name') }}" required autofocus>

              @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Duration</h5>
              <div class='input-group date datetimepicker3'>
                <input type='text' class="form-control" name="duration" value="{{ old('duration') }}" required/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>

              @if ($errors->has('duration'))
              <span class="help-block">
                <strong>{{ $errors->first('duration') }}</strong>
              </span>
              @endif
            </div>
              <div id="decide">
                <!--<button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-times"></i></button>-->
                <span><button type="submit" class="btn btn-warning btn-circle btn-lg center-block"><i class="fa fa-check"></i></button></span>
              </div>
            </form>
            <script type="text/javascript">
            $(function () {
              $('.datetimepicker3').datetimepicker({
                format: 'HH:mm'
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
