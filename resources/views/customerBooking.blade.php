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
            <li class="active"><a href="{{ route('booking_cus') }}/{{ $service->id }}">{{ $service->name }}</a></li>
            @else
            <li class=""><a href="{{ route('booking_cus') }}/{{ $service->id }}">{{ $service->name }}</a></li>
            @endif
            @endforeach
          </ul>
        </div>
        <div class="panel-body">
          @if (Session::has('success'))
          <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              {{ Session::get('success') }}
          </div>
          @endif
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
                      <form role="form" method="POST" action="{{ route('create_customer_booking') }}">
                        {{ csrf_field() }}
                        <h4>Customer</h4>
                        <select class="form-control" name="user[]">
                          @foreach ($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>
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
                            <?php
                              $j = 0;
                              ?>
                            @foreach ($availability as $available)
                              @if ($available->day == "Monday" && $available->employee_id == $employee->id)
                                <?php
                                $dd = strtotime($available->end) - strtotime($available->start);
                                $times = floor($dd / $single_service->duration);
                                ?>

                                @for ($i=0;$i<$times;$i++)
                                <?php
                                  $all_day[] = $available->day;
                                  $all_start[] = date('H:i', strtotime($available->start) + $i * $single_service->duration);
                                  $all_end[] = date('H:i', strtotime($available->start) + (($i + 1) * $single_service->duration));
                                ?>

                                @endfor

                              @endif
                            @endforeach

                            @if (isset($all_start))

                            @foreach ($bookings as $booking)

                              @foreach ($all_start as $key => $value)
                              <!--
                              {{ $value }} <=
                              {{ $booking->start }} &&
                              {{ date('H:i', strtotime($value) + $single_service->duration) }} >=
                              {{ $booking->end }} <br>
                              -->
                                @if (strtotime($value) >= strtotime($booking->start) && strtotime($value) + $single_service->duration <= strtotime($booking->end)
                                || strtotime($value) <= strtotime($booking->start) && strtotime($value) + $single_service->duration >= strtotime($booking->end))
                                  @if ($booking->date == date( 'Y-m-d', strtotime( 'this monday' )) && $booking->employee_id == $employee->id)
                                  <?php
                                    // echo $all_start[$key] . " - " . $all_end[$key] . " booked <br>";
                                    unset($all_start[$key]);
                                    unset($all_end[$key]);
                                   ?>
                                   @endif
                                @endif
                              @endforeach
                              <!-- -----------------------<br> -->
                            @endforeach

                            @foreach ($all_start as $key => $value)
                              <input type="hidden" name="date[]" value="{{ date( 'Y-m-d', strtotime( 'next ' . $all_day[$key] ) ) }}">
                              <input type="hidden" name="start[]" value="{{ date('H:i', strtotime($value)) }}">
                              <input type="hidden" name="end[]" value="{{ date('H:i', strtotime($all_end[$key])) }}">
                              <input type="hidden" name="service_id[]" value="{{ $id }}">
                              <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                              <tr class="gradeA">
                                <td>{{ $all_day[$key] }}</td>
                                <td>{{ $value }}</td>
                                <td>{{ $all_end[$key] }}</td>
                                <td><button class="btn btn-info" type="submit" name="book" value="{{ $j }}">Book</button></td>
                              </tr>
                              <?php $j++; ?>
                            @endforeach
                            <?php
                              unset($all_day);
                              unset($all_start);
                              unset($all_end);
                              ?>

                            @endif
                          </tbody>
                        </table>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="tuesday-pills{{ $employee->id }}">
                      <form role="form" method="POST" action="{{ route('create_customer_booking') }}">
                        {{ csrf_field() }}
                        <h4>Customer</h4>
                        <select class="form-control" name="user[]">
                          @foreach ($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>
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
                            <?php
                              $j = 0;
                              ?>
                            @foreach ($availability as $available)
                              @if ($available->day == "Tuesday" && $available->employee_id == $employee->id)
                                <?php
                                $dd = strtotime($available->end) - strtotime($available->start);
                                $times = floor($dd / $single_service->duration);
                                ?>

                                @for ($i=0;$i<$times;$i++)
                                <?php
                                  $all_day[] = $available->day;
                                  $all_start[] = date('H:i', strtotime($available->start) + $i * $single_service->duration);
                                  $all_end[] = date('H:i', strtotime($available->start) + (($i + 1) * $single_service->duration));
                                ?>

                                @endfor

                              @endif
                            @endforeach

                            @if (isset($all_start))

                            @foreach ($bookings as $booking)

                              @foreach ($all_start as $key => $value)
                              <!--
                              {{ $value }} <=
                              {{ $booking->start }} &&
                              {{ date('H:i', strtotime($value) + $single_service->duration) }} >=
                              {{ $booking->end }} <br>
                              -->
                                @if (strtotime($value) >= strtotime($booking->start) && strtotime($value) + $single_service->duration <= strtotime($booking->end)
                                || strtotime($value) <= strtotime($booking->start) && strtotime($value) + $single_service->duration >= strtotime($booking->end))
                                  @if ($booking->date == date( 'Y-m-d', strtotime( 'this tuesday' )) && $booking->employee_id == $employee->id)
                                  <?php
                                    // echo $all_start[$key] . " - " . $all_end[$key] . " booked <br>";
                                    unset($all_start[$key]);
                                    unset($all_end[$key]);
                                   ?>
                                   @endif
                                @endif
                              @endforeach
                              <!-- -----------------------<br> -->
                            @endforeach

                            @foreach ($all_start as $key => $value)
                              <input type="hidden" name="date[]" value="{{ date( 'Y-m-d', strtotime( 'next ' . $all_day[$key] ) ) }}">
                              <input type="hidden" name="start[]" value="{{ date('H:i', strtotime($value)) }}">
                              <input type="hidden" name="end[]" value="{{ date('H:i', strtotime($all_end[$key])) }}">
                              <input type="hidden" name="service_id[]" value="{{ $id }}">
                              <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                              <tr class="gradeA">
                                <td>{{ $all_day[$key] }}</td>
                                <td>{{ $value }}</td>
                                <td>{{ $all_end[$key] }}</td>
                                <td><button class="btn btn-info" type="submit" name="book" value="{{ $j }}">Book</button></td>
                              </tr>
                              <?php $j++; ?>
                            @endforeach
                            <?php
                              unset($all_day);
                              unset($all_start);
                              unset($all_end);
                              ?>

                            @endif
                            </tbody>
                          </table>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="wednesday-pills{{ $employee->id }}">
                      <form role="form" method="POST" action="{{ route('create_customer_booking') }}">
                        {{ csrf_field() }}
                        <h4>Customer</h4>
                        <select class="form-control" name="user[]">
                          @foreach ($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>
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
                            <?php $j = 0; ?>
                            @foreach ($availability as $available)
                              @if ($available->day == "Wednesday" && $available->employee_id == $employee->id)
                                <?php
                                $dd = strtotime($available->end) - strtotime($available->start);
                                $times = floor($dd / $single_service->duration);
                                ?>

                                @for ($i=0;$i<$times;$i++)
                                <?php
                                  $all_day[] = $available->day;
                                  $all_start[] = date('H:i', strtotime($available->start) + $i * $single_service->duration);
                                  $all_end[] = date('H:i', strtotime($available->start) + (($i + 1) * $single_service->duration));
                                ?>

                                @endfor

                              @endif
                            @endforeach

                            @if (isset($all_start))

                            @foreach ($bookings as $booking)

                              @foreach ($all_start as $key => $value)
                              <!--
                              {{ $value }} <=
                              {{ $booking->start }} &&
                              {{ date('H:i', strtotime($value) + $single_service->duration) }} >=
                              {{ $booking->end }} <br>
                              -->
                                @if (strtotime($value) >= strtotime($booking->start) && strtotime($value) + $single_service->duration <= strtotime($booking->end)
                                || strtotime($value) <= strtotime($booking->start) && strtotime($value) + $single_service->duration >= strtotime($booking->end))
                                  @if ($booking->date == date( 'Y-m-d', strtotime( 'this wednesday' )) && $booking->employee_id == $employee->id)
                                  <?php
                                    // echo $all_start[$key] . " - " . $all_end[$key] . " booked <br>";
                                    unset($all_start[$key]);
                                    unset($all_end[$key]);
                                   ?>
                                   @endif
                                @endif
                              @endforeach
                              <!-- -----------------------<br> -->
                            @endforeach

                            @foreach ($all_start as $key => $value)
                              <input type="hidden" name="date[]" value="{{ date( 'Y-m-d', strtotime( 'next ' . $all_day[$key] ) ) }}">
                              <input type="hidden" name="start[]" value="{{ date('H:i', strtotime($value)) }}">
                              <input type="hidden" name="end[]" value="{{ date('H:i', strtotime($all_end[$key])) }}">
                              <input type="hidden" name="service_id[]" value="{{ $id }}">
                              <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                              <tr class="gradeA">
                                <td>{{ $all_day[$key] }}</td>
                                <td>{{ $value }}</td>
                                <td>{{ $all_end[$key] }}</td>
                                <td><button class="btn btn-info" type="submit" name="book" value="{{ $j }}">Book</button></td>
                              </tr>
                              <?php $j++; ?>
                            @endforeach
                            <?php
                              unset($all_day);
                              unset($all_start);
                              unset($all_end);
                              ?>

                            @endif
                            </tbody>
                          </table>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="thursday-pills{{ $employee->id }}">
                      <form role="form" method="POST" action="{{ route('create_customer_booking') }}">
                        {{ csrf_field() }}
                        <h4>Customer</h4>
                        <select class="form-control" name="user[]">
                          @foreach ($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>
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
                            <?php $j = 0; ?>
                            @foreach ($availability as $available)
                              @if ($available->day == "Thursday" && $available->employee_id == $employee->id)
                                <?php
                                $dd = strtotime($available->end) - strtotime($available->start);
                                $times = floor($dd / $single_service->duration);
                                ?>

                                @for ($i=0;$i<$times;$i++)
                                <?php
                                  $all_day[] = $available->day;
                                  $all_start[] = date('H:i', strtotime($available->start) + $i * $single_service->duration);
                                  $all_end[] = date('H:i', strtotime($available->start) + (($i + 1) * $single_service->duration));
                                ?>

                                @endfor

                              @endif
                            @endforeach

                            @if (isset($all_start))

                            @foreach ($bookings as $booking)

                              @foreach ($all_start as $key => $value)
                              <!--
                              {{ $value }} <=
                              {{ $booking->start }} &&
                              {{ date('H:i', strtotime($value) + $single_service->duration) }} >=
                              {{ $booking->end }} <br>
                              -->
                                @if (strtotime($value) >= strtotime($booking->start) && strtotime($value) + $single_service->duration <= strtotime($booking->end)
                                || strtotime($value) <= strtotime($booking->start) && strtotime($value) + $single_service->duration >= strtotime($booking->end))
                                  @if ($booking->date == date( 'Y-m-d', strtotime( 'this thursday' )) && $booking->employee_id == $employee->id)
                                  <?php
                                    // echo $all_start[$key] . " - " . $all_end[$key] . " booked <br>";
                                    unset($all_start[$key]);
                                    unset($all_end[$key]);
                                   ?>
                                   @endif
                                @endif
                              @endforeach
                              <!-- -----------------------<br> -->
                            @endforeach

                            @foreach ($all_start as $key => $value)
                              <input type="hidden" name="date[]" value="{{ date( 'Y-m-d', strtotime( 'next ' . $all_day[$key] ) ) }}">
                              <input type="hidden" name="start[]" value="{{ date('H:i', strtotime($value)) }}">
                              <input type="hidden" name="end[]" value="{{ date('H:i', strtotime($all_end[$key])) }}">
                              <input type="hidden" name="service_id[]" value="{{ $id }}">
                              <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                              <tr class="gradeA">
                                <td>{{ $all_day[$key] }}</td>
                                <td>{{ $value }}</td>
                                <td>{{ $all_end[$key] }}</td>
                                <td><button class="btn btn-info" type="submit" name="book" value="{{ $j }}">Book</button></td>
                              </tr>
                              <?php $j++; ?>
                            @endforeach
                            <?php
                              unset($all_day);
                              unset($all_start);
                              unset($all_end);
                              ?>

                            @endif
                            </tbody>
                          </table>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="friday-pills{{ $employee->id }}">
                      <form role="form" method="POST" action="{{ route('create_customer_booking') }}">
                        {{ csrf_field() }}
                        <h4>Customer</h4>
                        <select class="form-control" name="user[]">
                          @foreach ($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>
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
                            <?php $j = 0; ?>
                            @foreach ($availability as $available)
                              @if ($available->day == "Friday" && $available->employee_id == $employee->id)
                                <?php
                                $dd = strtotime($available->end) - strtotime($available->start);
                                $times = floor($dd / $single_service->duration);
                                ?>

                                @for ($i=0;$i<$times;$i++)
                                <?php
                                  $all_day[] = $available->day;
                                  $all_start[] = date('H:i', strtotime($available->start) + $i * $single_service->duration);
                                  $all_end[] = date('H:i', strtotime($available->start) + (($i + 1) * $single_service->duration));
                                ?>

                                @endfor

                              @endif
                            @endforeach

                            @if (isset($all_start))

                            @foreach ($bookings as $booking)

                              @foreach ($all_start as $key => $value)
                              <!--
                              {{ $value }} <=
                              {{ $booking->start }} &&
                              {{ date('H:i', strtotime($value) + $single_service->duration) }} >=
                              {{ $booking->end }} <br>
                              -->
                                @if (strtotime($value) >= strtotime($booking->start) && strtotime($value) + $single_service->duration <= strtotime($booking->end)
                                || strtotime($value) <= strtotime($booking->start) && strtotime($value) + $single_service->duration >= strtotime($booking->end))
                                  @if ($booking->date == date( 'Y-m-d', strtotime( 'this friday' )) && $booking->employee_id == $employee->id)
                                  <?php
                                    // echo $all_start[$key] . " - " . $all_end[$key] . " booked <br>";
                                    unset($all_start[$key]);
                                    unset($all_end[$key]);
                                   ?>
                                   @endif
                                @endif
                              @endforeach
                              <!-- -----------------------<br> -->
                            @endforeach

                            @foreach ($all_start as $key => $value)
                              <input type="hidden" name="date[]" value="{{ date( 'Y-m-d', strtotime( 'next ' . $all_day[$key] ) ) }}">
                              <input type="hidden" name="start[]" value="{{ date('H:i', strtotime($value)) }}">
                              <input type="hidden" name="end[]" value="{{ date('H:i', strtotime($all_end[$key])) }}">
                              <input type="hidden" name="service_id[]" value="{{ $id }}">
                              <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                              <tr class="gradeA">
                                <td>{{ $all_day[$key] }}</td>
                                <td>{{ $value }}</td>
                                <td>{{ $all_end[$key] }}</td>
                                <td><button class="btn btn-info" type="submit" name="book" value="{{ $j }}">Book</button></td>
                              </tr>
                              <?php $j++; ?>
                            @endforeach
                            <?php
                              unset($all_day);
                              unset($all_start);
                              unset($all_end);
                              ?>

                            @endif
                            </tbody>
                          </table>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="saturday-pills{{ $employee->id }}">
                      <form role="form" method="POST" action="{{ route('create_customer_booking') }}">
                        {{ csrf_field() }}
                        <h4>Customer</h4>
                        <select class="form-control" name="user[]">
                          @foreach ($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>
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
                            <?php $j = 0; ?>
                            @foreach ($availability as $available)
                              @if ($available->day == "Saturday" && $available->employee_id == $employee->id)
                                <?php
                                $dd = strtotime($available->end) - strtotime($available->start);
                                $times = floor($dd / $single_service->duration);
                                ?>

                                @for ($i=0;$i<$times;$i++)
                                <?php
                                  $all_day[] = $available->day;
                                  $all_start[] = date('H:i', strtotime($available->start) + $i * $single_service->duration);
                                  $all_end[] = date('H:i', strtotime($available->start) + (($i + 1) * $single_service->duration));
                                ?>

                                @endfor

                              @endif
                            @endforeach

                            @if (isset($all_start))

                            @foreach ($bookings as $booking)

                              @foreach ($all_start as $key => $value)
                              <!--
                              {{ $value }} <=
                              {{ $booking->start }} &&
                              {{ date('H:i', strtotime($value) + $single_service->duration) }} >=
                              {{ $booking->end }} <br>
                              -->
                                @if (strtotime($value) >= strtotime($booking->start) && strtotime($value) + $single_service->duration <= strtotime($booking->end)
                                || strtotime($value) <= strtotime($booking->start) && strtotime($value) + $single_service->duration >= strtotime($booking->end))
                                  @if ($booking->date == date( 'Y-m-d', strtotime( 'this saturday' )) && $booking->employee_id == $employee->id)
                                  <?php
                                    // echo $all_start[$key] . " - " . $all_end[$key] . " booked <br>";
                                    unset($all_start[$key]);
                                    unset($all_end[$key]);
                                   ?>
                                   @endif
                                @endif
                              @endforeach
                              <!-- -----------------------<br> -->
                            @endforeach

                            @foreach ($all_start as $key => $value)
                              <input type="hidden" name="date[]" value="{{ date( 'Y-m-d', strtotime( 'next ' . $all_day[$key] ) ) }}">
                              <input type="hidden" name="start[]" value="{{ date('H:i', strtotime($value)) }}">
                              <input type="hidden" name="end[]" value="{{ date('H:i', strtotime($all_end[$key])) }}">
                              <input type="hidden" name="service_id[]" value="{{ $id }}">
                              <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                              <tr class="gradeA">
                                <td>{{ $all_day[$key] }}</td>
                                <td>{{ $value }}</td>
                                <td>{{ $all_end[$key] }}</td>
                                <td><button class="btn btn-info" type="submit" name="book" value="{{ $j }}">Book</button></td>
                              </tr>
                              <?php $j++; ?>
                            @endforeach
                            <?php
                              unset($all_day);
                              unset($all_start);
                              unset($all_end);
                              ?>

                            @endif
                            </tbody>
                          </table>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="sunday-pills{{ $employee->id }}">
                      <form role="form" method="POST" action="{{ route('create_customer_booking') }}">
                        {{ csrf_field() }}
                        <h4>Customer</h4>
                        <select class="form-control" name="user[]">
                          @foreach ($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>
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
                            <?php $j = 0; ?>
                            @foreach ($availability as $available)
                              @if ($available->day == "Sunday" && $available->employee_id == $employee->id)
                                <?php
                                $dd = strtotime($available->end) - strtotime($available->start);
                                $times = floor($dd / $single_service->duration);
                                ?>

                                @for ($i=0;$i<$times;$i++)
                                <?php
                                  $all_day[] = $available->day;
                                  $all_start[] = date('H:i', strtotime($available->start) + $i * $single_service->duration);
                                  $all_end[] = date('H:i', strtotime($available->start) + (($i + 1) * $single_service->duration));
                                ?>

                                @endfor

                              @endif
                            @endforeach

                            @if (isset($all_start))

                            @foreach ($bookings as $booking)

                              @foreach ($all_start as $key => $value)
                              <!--
                              {{ $value }} <=
                              {{ $booking->start }} &&
                              {{ date('H:i', strtotime($value) + $single_service->duration) }} >=
                              {{ $booking->end }} <br>
                              -->
                                @if (strtotime($value) >= strtotime($booking->start) && strtotime($value) + $single_service->duration <= strtotime($booking->end)
                                || strtotime($value) <= strtotime($booking->start) && strtotime($value) + $single_service->duration >= strtotime($booking->end))
                                  @if ($booking->date == date( 'Y-m-d', strtotime( 'this sunday' )) && $booking->employee_id == $employee->id)
                                  <?php
                                    // echo $all_start[$key] . " - " . $all_end[$key] . " booked <br>";
                                    unset($all_start[$key]);
                                    unset($all_end[$key]);
                                   ?>
                                   @endif
                                @endif
                              @endforeach
                              <!-- -----------------------<br> -->
                            @endforeach

                            @foreach ($all_start as $key => $value)
                              <input type="hidden" name="date[]" value="{{ date( 'Y-m-d', strtotime( 'next ' . $all_day[$key] ) ) }}">
                              <input type="hidden" name="start[]" value="{{ date('H:i', strtotime($value)) }}">
                              <input type="hidden" name="end[]" value="{{ date('H:i', strtotime($all_end[$key])) }}">
                              <input type="hidden" name="service_id[]" value="{{ $id }}">
                              <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                              <tr class="gradeA">
                                <td>{{ $all_day[$key] }}</td>
                                <td>{{ $value }}</td>
                                <td>{{ $all_end[$key] }}</td>
                                <td><button class="btn btn-info" type="submit" name="book" value="{{ $j }}">Book</button></td>
                              </tr>
                              <?php $j++; ?>
                            @endforeach
                            <?php
                              unset($all_day);
                              unset($all_start);
                              unset($all_end);
                              ?>

                            @endif
                            </tbody>
                          </table>
                      </form>
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
