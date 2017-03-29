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


</div>

@endsection
