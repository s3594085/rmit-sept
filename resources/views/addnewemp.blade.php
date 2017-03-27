@extends('layouts.master')

@section('content')
<html lang="{{ config('app.locale') }}">
<head>
<style>
div.container {
    width: 100%;
    border: 1px solid gray;
}

header{
    padding: 1em;
    color: black;
    background-color: #99ffff;
    clear: left;
    text-align: center  ;
}

footer{
   bottom: 0;

   padding: 1em;
   color: black;
   background-color: #99ffff;
   clear: left;
   text-align: center;
}

nav {
    float: left;
    max-width: 180px;
    margin: 0;
    padding: 1em;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul a {
    text-decoration: none;
}

section {
    margin-left: 170px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
</style>
</head>
<body>

<div class="container">

<header>
  <h1>Your Business Name</h1>
</header>

<nav>
 <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
  <ul>
    <span class="input-group-btn"><li><a href="#"><i class="fa fa-home"></i> Account Info</a></li></span>
    <span class="input-group-btn"><li><a href="#"><i class="fa fa-book"></i> Booking Summary</a></li></span>
    <span class="input-group-btn"><li><a href="#"><i class="fa fa-bell"></i> Appointments</a></li></span>
    <span class="input-group-btn"><li><a href="#"><i class="fa fa-user"></i> Employee <span class="fa arrow"></span></a></li></span>
  </ul>

</nav>

<section>
  <div class="row">
                <div class="col-lg-12" style="text-align:center;">
                    <h1 class="page-header">Add New Employee</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
  <form id="addnewemp">
    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}" style="text-align:center;">
    Fisrt Name<br>
    <input id="firstname" type="text" name="firstname" placeholder="First Name" class="form-control" value="{{ old('firstname') }}" required autofocus>

    @if ($errors->has('firstname'))
    <span class="help-block">
      <strong>{{ $errors->first('firstname') }}</strong>
    </span>
    @endif
  </div>
 <br>
  <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}" style="text-align:center;">
  Last Name<br>
  <input id="lastname" type="text" name="lastname" placeholder="Last Name" class="form-control" value="{{ old('lastname') }}" required autofocus>

  @if ($errors->has('lastname'))
  <span class="help-block">
    <strong>{{ $errors->first('lastname') }}</strong>
  </span>
  @endif
</div>
<br>
<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}" style="text-align:center;">
  Mobile (Australian mobile starts with 04)<br>
  <input id="mobile" type="number" placeholder="Mobile" class="form-control" name="mobile" value="{{ old('mobile') }}" required>

  @if ($errors->has('mobile'))
  <span class="help-block">
    <strong>{{ $errors->first('mobile') }}</strong>
  </span>
  @endif
</div>
<br>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="text-align:center;">
  Email Address<br>
  <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required>

  @if ($errors->has('email'))
  <span class="help-block">
    <strong>{{ $errors->first('email') }}</strong>
  </span>
  @endif
</div>
<br>
<div id="availability" style="text-align:center;">
  Availability<br>
  <textarea name="message" rows="5" cols="60" required></textarea>
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
<div id="decide" >
  <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times">Cancel</i></button>
  <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-check">Add Employee</i></button>
</div>
  </form>
</section >

<footer>Copyright &copy; BusinessName.com</footer>

</div>

</body>
</html>

@endsection
