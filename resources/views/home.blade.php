@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">
              Welcome to {{ session('business_name') }}
          </h1>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
