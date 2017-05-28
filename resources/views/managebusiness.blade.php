@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Manage Businesses
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          List of businesses
        </div>
        <div class="panel-body">
          @if (Session::has('deleted'))
          <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              {{ Session::get('deleted') }}
          </div>
          @endif
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>ID #</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Street</th>
                <th>City</th>
                <th>Operate Hour</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($businesses as $business)
              <tr class="gradeA">
                <td>{{ $business->id }}</td>
                <td>{{ $business->name }}</td>
                <td>{{ $business->mobile }}</td>
                <td>{{ $business->street }}</td>
                <td>{{ $business->city }}</td>
                <td>{{ $business->start }} to {{ $business->end }}</td>
                <td>
                  <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                  <a href="" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
