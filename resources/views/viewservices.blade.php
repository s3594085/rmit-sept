@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        View Services
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          List of services
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
                <th>Duration</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($services as $service)
              <tr class="gradeA">
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->duration }}</td>
                <td>
                  <a href="#" title="Avaibility" class="btn btn-success btn-circle"><i class="fa fa-clock-o"></i></a>
                  <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                  <a href="#" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
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
