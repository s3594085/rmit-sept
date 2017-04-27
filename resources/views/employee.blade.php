@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Employee {{ $employees->name }}
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Add employee availability
        </div>
        <div class="panel-body">
          @if (Session::has('success'))
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('success') }}
          </div>
          @elseif (Session::has('deleted'))
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('deleted') }}
          </div>
          @elseif (Session::has('fail'))
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('fail') }}
          </div>
          @endif

          <form id="" role="form" method="POST" action="{{ route('create_availability') }}">
            {{ csrf_field() }}
            <div class="form-group">
              <input type="hidden" name="employee_id" value="{{ $employees->id }}" required>
              <strong>Day : </strong>
              <select class="form-control" name="day">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
              </select>
              <br>
              <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}" style="text-align:left;">
                <strong>Start Time : </strong>
                <div class='input-group date datetimepicker3'>
                  <input type='text' class="form-control" name="start" value="{{ old('start') }}" required/>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                  </span>
                </div>
                @if ($errors->has('start'))
                <span class="help-block">
                  <strong>{{ $errors->first('start') }}</strong>
                </span>
                @endif
              </div>
              <br>
              <strong>End Time : </strong>
              <div class='input-group date datetimepicker3'>
                <input type='text' class="form-control" name="end" value="{{ old('end') }}" required/>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>
            </div>
            <button type="submit" title="Add" class="btn btn-warning btn-circle btn-lg center-block"><i class="fa fa-check"></i></button>
          </form>
          <script type="text/javascript">
          $(function () {
            $('.datetimepicker3').datetimepicker({
              format: 'HH:mm'
            });
          });
          </script>

        </div>
      </div>
    </div>
  </div>

  <!-- start of availability -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Availability
        </div>
        <div class="panel-body">
          <!-- Nav tabs -->
          <ul class="nav nav-pills">
            <li class="active"><a href="#all-pills" data-toggle="tab" aria-expanded="true">Weekly</a>
            </li>
            <li class=""><a href="#monday-pills" data-toggle="tab" aria-expanded="true">Monday</a>
            </li>
            <li class=""><a href="#tuesday-pills" data-toggle="tab" aria-expanded="false">Tuesday</a>
            </li>
            <li class=""><a href="#wednesday-pills" data-toggle="tab" aria-expanded="false">Wednesday</a>
            </li>
            <li class=""><a href="#thursday-pills" data-toggle="tab" aria-expanded="false">Thursday</a>
            </li>
            <li class=""><a href="#friday-pills" data-toggle="tab" aria-expanded="false">Friday</a>
            </li>
            <li class=""><a href="#saturday-pills" data-toggle="tab" aria-expanded="false">Saturday</a>
            </li>
            <li class=""><a href="#sunday-pills" data-toggle="tab" aria-expanded="false">Sunday</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane fade active in" id="all-pills">
              <h4>Weekly</h4>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($availability as $available)
                  <tr class="gradeA">
                    <td>{{ $available->day }}</td>
                    <td>{{ $available->start }}</td>
                    <td>{{ $available->end }}</td>
                    <td>
                      <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('/employeeavailability/delete/' . $available->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="monday-pills">
              <h4>Monday</h4>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($availability as $available)
                  @if ($available->day == "Monday")
                  <tr class="gradeA">
                    <td>{{ $available->day }}</td>
                    <td>{{ $available->start }}</td>
                    <td>{{ $available->end }}</td>
                    <td>
                      <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('/employeeavailability/delete/' . $available->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="tuesday-pills">
              <h4>Tuesday</h4>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($availability as $available)
                  @if ($available->day == 'Tuesday')
                  <tr class="gradeA">
                    <td>{{ $available->day }}</td>
                    <td>{{ $available->start }}</td>
                    <td>{{ $available->end }}</td>
                    <td>
                      <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('/employeeavailability/delete/' . $available->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="wednesday-pills">
              <h4>Wednesday</h4>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($availability as $available)
                  @if ($available->day == 'Wednesday')
                  <tr class="gradeA">
                    <td>{{ $available->day }}</td>
                    <td>{{ $available->start }}</td>
                    <td>{{ $available->end }}</td>
                    <td>
                      <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('/employeeavailability/delete/' . $available->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="thursday-pills">
              <h4>Thursday</h4>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($availability as $available)
                  @if ($available->day == 'Thursday')
                  <tr class="gradeA">
                    <td>{{ $available->day }}</td>
                    <td>{{ $available->start }}</td>
                    <td>{{ $available->end }}</td>
                    <td>
                      <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('/employeeavailability/delete/' . $available->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="friday-pills">
              <h4>Friday</h4>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($availability as $available)
                  @if ($available->day == 'Friday')
                  <tr class="gradeA">
                    <td>{{ $available->day }}</td>
                    <td>{{ $available->start }}</td>
                    <td>{{ $available->end }}</td>
                    <td>
                      <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('/employeeavailability/delete/' . $available->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="saturday-pills">
              <h4>Saturday</h4>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($availability as $available)
                  @if ($available->day == 'Saturday')
                  <tr class="gradeA">
                    <td>{{ $available->day }}</td>
                    <td>{{ $available->start }}</td>
                    <td>{{ $available->end }}</td>
                    <td>
                      <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('/employeeavailability/delete/' . $available->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="sunday-pills">
              <h4>Sunday</h4>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($availability as $available)
                  @if ($available->day == 'Sunday')
                  <tr class="gradeA">
                    <td>{{ $available->day }}</td>
                    <td>{{ $available->start }}</td>
                    <td>{{ $available->end }}</td>
                    <td>
                      <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('/employeeavailability/delete/' . $available->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
