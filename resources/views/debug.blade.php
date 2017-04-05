@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Debug Page
      </h1>
      <h2>
        Current user role :
        @if (Auth::user()->owner)
        Owner
        @else
        Customer
        @endif
      </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          List of users
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Rank</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr class="gradeA">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>
                  @if ($user->owner)
                  Owner
                  @else
                  Customer
                  @endif
                </td>
                <td><a href="{{ url('/debug/' . $user->id) }}" class='btn btn-danger'>Swap</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Create Booking
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <form id="addnewemp" role="form" method="POST" action="{{ route('create_booking') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Date</h5>
              <select name="date" required autofocus class="form-control">
                <option value="{{ date( 'Ymd', strtotime( 'next monday' ) ) }}">Monday</option>
                <option value="{{ date( 'Ymd', strtotime( 'next tuesday' ) ) }}">Tuesday</option>
                <option value="{{ date( 'Ymd', strtotime( 'next wednesday' ) ) }}">Wednesday</option>
                <option value="{{ date( 'Ymd', strtotime( 'next thursday' ) ) }}">Thursday</option>
                <option value="{{ date( 'Ymd', strtotime( 'next friday' ) ) }}">Friday</option>
                <option value="{{ date( 'Ymd', strtotime( 'next saturday' ) ) }}">Saturday</option>
                <option value="{{ date( 'Ymd', strtotime( 'next sunday' ) ) }}">Sunday</option>
              </select>
              @if ($errors->has('date'))
              <span class="help-block">
                <strong>{{ $errors->first('date') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Employee</h5>
              <select name="employee_id" required autofocus class="form-control">
                <option value="1">John Wick</option>
              </select>
              @if ($errors->has('employee_id'))
              <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>Start Time</h5>
              <input id="start" type="text" placeholder="09:00"   class="form-control" name="start" value="{{ old('start') }}" required>

              @if ($errors->has('start'))
              <span class="help-block">
                <strong>{{ $errors->first('start') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="text-align:left;">
              <h5>End Time</h5>
              <input id="end" type="text" placeholder="18:00"  class="form-control" name="end" value="{{ old('end') }}" required>

              @if ($errors->has('end'))
              <span class="help-block">
                <strong>{{ $errors->first('end') }}</strong>
              </span>
              @endif
            </div>

            <span><button type="submit" class="btn btn-warning btn-circle btn-lg center-block"><i class="fa fa-check"></i></button></span>
          </form>
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>


</div>

@endsection
