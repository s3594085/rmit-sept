@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Booking Summary
      </h1>
    </div>

    <div class="col-lg-12">
      <button type="button" class="btn btn-primary btn-lg">Last Week</button>
      <span style="margin-left:2em;"><button type="button" class="btn btn-primary btn-lg">This Week</button></span>
    </div>


    <div class="row">
      <div class="col-lg-12" style="margin-top:2em;">
        <div class="panel panel-default">
          <div class="panel-heading">
            Appointments
          </div>

          <div class="panel-body">
            <a href="#">Weekly</a>
            <span style="margin-left:3em;"><a href="#">Monday</a></span>
            <span style="margin-left:3em;"><a href="#">Tuesday</a></span>
            <span style="margin-left:3em;"><a href="#">Wednesday</a></span>
            <span style="margin-left:3em;"><a href="#">Thursday</a></span>
            <span style="margin-left:3em;"><a href="#">Friday</a></span>
            <span style="margin-left:3em;"><a href="#">Saturday</a></span>
            <span style="margin-left:3em;"><a href="#">Sunday</a></span>
            <div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
