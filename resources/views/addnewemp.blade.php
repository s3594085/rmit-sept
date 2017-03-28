@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Add New Employees
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-7 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          Add new employees here
        </div>
      <div class="panel-body">
      <form id="addnewemp">
        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}" style="text-align:center;">
        Fisrt Name<br>
        <input id="firstname" type="text" name="firstname" style="width:450px;margin-left:50px" placeholder="First Name" class="form-control" value="{{ old('firstname') }}" required autofocus>

        @if ($errors->has('firstname'))
        <span class="help-block">
          <strong>{{ $errors->first('firstname') }}</strong>
        </span>
        @endif
      </div>
     <br>
      <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}" style="text-align:center;">
      Last Name<br>
      <input id="lastname" type="text" name="lastname" style="width:450px;margin-left:50px" placeholder="Last Name" class="form-control" value="{{ old('lastname') }}" required autofocus>

      @if ($errors->has('lastname'))
      <span class="help-block">
        <strong>{{ $errors->first('lastname') }}</strong>
      </span>
      @endif
    </div>
    <br>
    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}" style="text-align:center;">
      Mobile (Australian mobile starts with 04)<br>
      <input id="mobile" type="number" placeholder="Mobile" style="width:450px;margin-left:50px"  class="form-control" name="mobile" value="{{ old('mobile') }}" required>

      @if ($errors->has('mobile'))
      <span class="help-block">
        <strong>{{ $errors->first('mobile') }}</strong>
      </span>
      @endif
    </div>
    <br>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="text-align:center;">
      Email Address<br>
      <input id="email" type="email" placeholder="Email" style="width:450px;margin-left:50px" class="form-control" name="email" value="{{ old('email') }}" required>

      @if ($errors->has('email'))
      <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>
    <br>
    <div id="availability" style="text-align:center;">
      Availability<br>
      <textarea name="message" rows="4" cols="60" style="width:400px;margin-left:45px" required></textarea>
    </div>
    <br>
    <div id="time" style="text-align:center;">
    Day <select> <option value="Sunday">Sunday</option>
                <option value="Monday">Monday</option>
              <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
          <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
      <option value="Saturday">Saturday</option></select>
    Start Time <select><option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option></select>
    <select><option value="00">00</option>
    <option value="15">15</option>
    <option value="30">30</option>
    <option value="45">45</option></select>
    End Time <select><option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option></select>
    <select><option value="00">00</option>
    <option value="15">15</option>
    <option value="30">30</option>
    <option value="45">45</option></select>
    <br>
    <div id="addAvailability" style="text-align:center">
      <button type="button" style="margin-top:2em">Add Availability</button>
    </div>
    <br>
    <br>
    <div id="decide">
      <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-times"></i></button>
      <span style="margin-left:200px"><button type="button" class="btn btn-warning btn-circle btn-lg"><i class="fa fa-check"></i></button></span>
    </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</div>
@endsection
