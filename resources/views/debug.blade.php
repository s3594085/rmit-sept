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

  <!-- Employee Register -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Create employee
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <form role="form" method="POST" action="{{ route('employee') }}">
            {{ csrf_field() }}
            <input class="form-control" name='name' placeholder="Name">
            <input class="form-control" name='email' placeholder="Email">
            <input class="form-control" name='mobile' placeholder="Mobile">
            <input class="form-control" name='street' placeholder="Street">
            <input class="form-control" name='city' placeholder="City">
            <button name='register' type="submit" class="btn btn-lg btn-primary btn-block">
              Create
            </button>
          </form>
        </div>

        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
              <tr class="gradeA">
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->mobile }}</td>
                <td><a href="{{ url('/employee/delete/' . $employee->id) }}" class='btn btn-danger'>Delete</a></td>
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

  <!-- Employee Working Time -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Create employee
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <form role="form" method="POST" action="{{ route('employeeTime') }}">
            {{ csrf_field() }}
            <input class="form-control" name='employee_id' placeholder="Employee ID">
            <input class="form-control" name='day' placeholder="Day">
            <input class="form-control" name='start' placeholder="Start">
            <input class="form-control" name='end' placeholder="End">
            <button name='add' type="submit" class="btn btn-lg btn-primary btn-block">
              Add
            </button>
          </form>
        </div>

        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>ID</th>
                <th>day</th>
                <th>start</th>
                <th>end</th>
                <th>Employee</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employeeTimes as $employeetime)
              <tr class="gradeA">
                <td>{{ $employeetime->id }}</td>
                <td>{{ $employeetime->day }}</td>
                <td>{{ $employeetime->start }}</td>
                <td>{{ $employeetime->end }}</td>
                <td>{{ $employeetime->employee_id }}</td>
                <td><a href="{{ url('/employeeTime/delete/' . $employeetime->id) }}" class='btn btn-danger'>Delete</a></td>
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
</div>

@endsection
