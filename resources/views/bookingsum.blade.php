@extends('layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Booking Summary
      </h1>
    </div>

    <ul class="nav nav-pills btn-lg">
      <li class="" style="margin-left:1em;"><a href="#all-pills" data-toggle="tab" aria-expanded="true">All Week</a>
      </li>
      <li class="active" style="margin-left:1em;"><a href="#this-pills" data-toggle="tab" aria-expanded="false">This Week</a>
      </li>
      <li class="" style="margin-left:1em;"><a href="#last-pills" data-toggle="tab" aria-expanded="false">Last Week</a>
      </li>
    </ul>

    <div class="row">
      <div class="col-lg-12" style="margin-top:2em;">
        <div class="panel panel-default">
          <div class="panel-heading">
            Appointments
          </div>

          <div class="panel-body">
            <div class="tab-content">

              <div class="tab-pane fade" id="all-pills">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Customer</th>
                      <th>Employee</th>
                      <th>Date</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bookings as $booking)
                    <tr class="gradeA">
                      <td>{{ $booking->user }}</td>
                      <td>{{ $booking->name }}</td>
                      <td>{{ $booking->date }}</td>
                      <td>{{ $booking->start }}</td>
                      <td>{{ $booking->end }}</td>
                      <td>
                        <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                        <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade active in" id="this-pills">
                <ul class="nav nav-pills">
                  <li class="active"><a href="#week-pills" data-toggle="tab" aria-expanded="true">Weekly</a>
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
                <br>

                <div class="tab-content">
                  <div class="tab-pane fade active in" id="week-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) >= strtotime(date( 'Ymd', strtotime( 'today' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="monday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'this monday' ) ) ) )
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="tuesday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'this tuesday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="wednesday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'this wednesday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="thursday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'this thursday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="friday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'this friday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="saturday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'this saturday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="sunday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'this sunday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>

              <div class="tab-pane fade" id="last-pills">
                <ul class="nav nav-pills">
                  <li class="active"><a href="#last-week-pills" data-toggle="tab" aria-expanded="true">Weekly</a>
                  </li>
                  <li class=""><a href="#last-monday-pills" data-toggle="tab" aria-expanded="false">Monday</a>
                  </li>
                  <li class=""><a href="#last-tuesday-pills" data-toggle="tab" aria-expanded="false">Tuesday</a>
                  </li>
                  <li class=""><a href="#last-wednesday-pills" data-toggle="tab" aria-expanded="false">Wednesday</a>
                  </li>
                  <li class=""><a href="#last-thursday-pills" data-toggle="tab" aria-expanded="false">Thursday</a>
                  </li>
                  <li class=""><a href="#last-friday-pills" data-toggle="tab" aria-expanded="false">Friday</a>
                  </li>
                  <li class=""><a href="#last-saturday-pills" data-toggle="tab" aria-expanded="false">Saturday</a>
                  </li>
                  <li class=""><a href="#last-sunday-pills" data-toggle="tab" aria-expanded="false">Sunday</a>
                  </li>
                </ul>
                <br>

                <div class="tab-content">
                  <div class="tab-pane fade active in" id="last-week-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) < strtotime(date( 'Ymd', strtotime( 'today' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="last-monday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'last monday' ) ) ) )
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="last-tuesday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'last tuesday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="last-wednesday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'last wednesday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="last-thursday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'last thursday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="last-friday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'last friday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="last-saturday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'last saturday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="last-sunday-pills">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Customer</th>
                          <th>Employee</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($bookings as $booking)
                        @if (strtotime($booking->date) == strtotime(date( 'Ymd', strtotime( 'last sunday' ) ) ))
                        <tr class="gradeA">
                          <td>{{ $booking->user }}</td>
                          <td>{{ $booking->name }}</td>
                          <td>{{ $booking->date }}</td>
                          <td>{{ $booking->start }}</td>
                          <td>{{ $booking->end }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('/booking/delete/' . $booking->id) }}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
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
    </div>
  </div>
  @endsection
