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
    <div class="col-lg-6 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Add new employees here
        </div>
        <div class="panel-body">
             @if (Session::has('success'))
             <div class="alert alert-success alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 {{ Session::get('success') }}
             </div>
             @endif
             <form id="addnewemp" role="form" method="POST" action="{{ route('create_employee') }}">
               {{ csrf_field() }}
               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="text-align:left;">
                 <h5>Name</h5>
                 <input id="lastname" type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required autofocus>

                 @if ($errors->has('name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                        </div>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}" style="text-align:left;">
                          <h5>Mobile</h5>
                          <input id="mobile" type="number" placeholder="Mobile"   class="form-control" name="mobile" value="{{ old('mobile') }}" required>

                          @if ($errors->has('mobile'))
                                 <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                  </span>
                                  @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="text-align:left;">
                                  <h5>Email Address</h5>
                                  <input id="email" type="email" placeholder="Email"  class="form-control" name="email" value="{{ old('email') }}" required>

                                  @if ($errors->has('email'))
                                          <span class="help-block">
                                             <strong>{{ $errors->first('email') }}</strong>
                                           </span>
                                           @endif
                                         </div>
                                         <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}" style="text-align:left;">
                                           <h5>Street</h5>
                                           <input id="street" type="text" placeholder="Street"  class="form-control" name="street" value="{{ old('street') }}" required>

                                           @if ($errors->has('street'))
                                                    <span class="help-block">
                                                     <strong>{{ $errors->first('street') }}</strong>
                                                   </span>
                                                   @endif
                                                 </div>
                                                 <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}" style="text-align:left;">
                                                   <h5>City</h5>
                                                   <input id="city" type="text" placeholder="City"  class="form-control" name="city" value="{{ old('city') }}" required>

                                                   @if ($errors->has('city'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                                    @endif
                                                  </div>
  <!--  <div id="availability" style="text-align:center;">
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
    <br>-->
    <div id="decide">
      <span><button type="submit" class="btn btn-warning btn-circle btn-lg center-block"><i class="fa fa-check"></i></button></span>
    </div>
      </form>
    </div>
    </div>
    </div>
    </div>
  </div>
</div>
@endsection
