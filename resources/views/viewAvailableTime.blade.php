@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        View Booking Availability
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Booking Availability
        </div>
        <div class="panel-body">
          <h4>Services</h4>
          <ul class="nav nav-pills">
            @foreach ($services as $service)
              @if ($id == $service->id)
              <li class="active"><a href="{{ route('view_available_booking') }}/{{ $service->id }}">{{ $service->name }}</a></li>
              @else
              <li class=""><a href="{{ route('view_available_booking') }}/{{ $service->id }}">{{ $service->name }}</a></li>
              @endif
            @endforeach
          </ul>
        </div>
        <div class="panel-body">
          @foreach ($employees as $employee)
          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Employee <strong>{{ $employee->name }}</strong>
                </div>
                <div class="panel-body">
                  <!-- Nav tabs -->
                  <ul class="nav nav-pills">
                    <li class="active"><a href="#monday-pills{{ $employee->id }}" data-toggle="tab" aria-expanded="true">Monday</a>
                    </li>
                    <li class=""><a href="#tuesday-pills{{ $employee->id }}" data-toggle="tab" aria-expanded="false">Tuesday</a>
                    </li>
                    <li class=""><a href="#wednesday-pills{{ $employee->id }}" data-toggle="tab" aria-expanded="false">Wednesday</a>
                    </li>
                    <li class=""><a href="#thursday-pills{{ $employee->id }}" data-toggle="tab" aria-expanded="false">Thursday</a>
                    </li>
                    <li class=""><a href="#friday-pills{{ $employee->id }}" data-toggle="tab" aria-expanded="false">Friday</a>
                    </li>
                    <li class=""><a href="#saturday-pills{{ $employee->id }}" data-toggle="tab" aria-expanded="false">Saturday</a>
                    </li>
                    <li class=""><a href="#sunday-pills{{ $employee->id }}" data-toggle="tab" aria-expanded="false">Sunday</a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div class="tab-pane fade active in" id="monday-pills{{ $employee->id }}">
                      <h4>Monday</h4>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($availability as $available)
                          @if ($available->day == "Monday" && $available->employee_id == $employee->id)
                            <?php
                              $dd = strtotime($available->end) - strtotime($available->start);
                              $times = floor($dd / $single_service->duration);
                            ?>
                            @for ($i=0;$i<$times;$i++)
                            <tr class="gradeA">
                              <td>{{ $available->day }}</td>
                              <td>{{ date('H:i', strtotime($available->start) + $i * $single_service->duration) }}</td>
                              <td>{{ date('H:i', strtotime($available->start) + (($i + 1) * $single_service->duration)) }}</td>
                            </tr>
                            @endfor
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="tuesday-pills{{ $employee->id }}">
                      <h4>Tuesday</h4>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($availability as $available)
                          @if ($available->day == 'Tuesday' && $available->employee_id == $employee->id)
                          <tr class="gradeA">
                            <td>{{ $available->day }}</td>
                            <td>{{ $available->start }}</td>
                            <td>{{ $available->end }}</td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="wednesday-pills{{ $employee->id }}">
                      <h4>Wednesday</h4>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($availability as $available)
                          @if ($available->day == 'Wednesday' && $available->employee_id == $employee->id)
                          <tr class="gradeA">
                            <td>{{ $available->day }}</td>
                            <td>{{ $available->start }}</td>
                            <td>{{ $available->end }}</td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="thursday-pills{{ $employee->id }}">
                      <h4>Thursday</h4>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($availability as $available)
                          @if ($available->day == 'Thursday' && $available->employee_id == $employee->id)
                          <tr class="gradeA">
                            <td>{{ $available->day }}</td>
                            <td>{{ $available->start }}</td>
                            <td>{{ $available->end }}</td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="friday-pills{{ $employee->id }}">
                      <h4>Friday</h4>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($availability as $available)
                          @if ($available->day == 'Friday' && $available->employee_id == $employee->id)
                          <tr class="gradeA">
                            <td>{{ $available->day }}</td>
                            <td>{{ $available->start }}</td>
                            <td>{{ $available->end }}</td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="saturday-pills{{ $employee->id }}">
                      <h4>Saturday</h4>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($availability as $available)
                          @if ($available->day == 'Saturday' && $available->employee_id == $employee->id)
                          <tr class="gradeA">
                            <td>{{ $available->day }}</td>
                            <td>{{ $available->start }}</td>
                            <td>{{ $available->end }}</td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="sunday-pills{{ $employee->id }}">
                      <h4>Sunday</h4>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($availability as $available)
                          @if ($available->day == 'Sunday' && $available->employee_id == $employee->id)
                          <tr class="gradeA">
                            <td>{{ $available->day }}</td>
                            <td>{{ $available->start }}</td>
                            <td>{{ $available->end }}</td>
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
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
