@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Add New Booking
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Select service & employee here
        </div>
        <div class="panel-body">
          <form role="form" method="POST" action="{{ route('add_booking') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Services</h5>
              <select id="service" type="text" name="service" class="form-control" required autofocus>
                @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Employees</h5>
              <select id="employee" type="text" name="employee" class="form-control" required>
                @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
              </select>
              <br>
              <div id="decide">
                <!--<button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-times"></i></button>-->
                <span>
                  <button type="submit" name="submit" class="btn btn-warning btn-circle btn-lg center-block"><i class="fa fa-check"></i></button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
