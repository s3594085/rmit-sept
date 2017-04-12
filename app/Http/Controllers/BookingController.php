<?php

namespace App\Http\Controllers;

use App\User;
use App\Booking;
use Auth;
use URL;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //Only authenticated user can access Booking controller
    public function __construct()
    {
        $this->middleware('auth');

        //only owner can access viewAllBooking function
        $this->middleware('owner', ['only' => ['viewAllBooking']]);
    }

    //User create booking function
    public function createBooking(Request $data) {
      $valid = Booking::validator($data->all());

      if ($valid->passes()) {
        $user = User::find(Auth::user()->id);

        $user->booking()->create([
          'date' => $data['date'],
          'start' => $data['start'],
          'end' => $data['end'],
          'employee_id' => $data['employee_id'],
        ]);

        //Session::flash('success', "Booking successful added!");
        return redirect(URL::previous());
      } else {
        return redirect(URL::previous())->withErrors($valid)->withInput();
      }
    }

    //Delete booking function
    public function deleteBooking(Request $data, $id) {
      $deleted = DB::delete('DELETE FROM bookings WHERE id = ?', [$id]);

      Session::flash('deleted', "Booking " . $id . " successful deleted!");
      return redirect(route('booking_sum'));
    }

    //Owner view all booking function (Summary)
    public function viewAllBooking() {
      $bookings = DB::table('bookings')
              ->join('employees', 'bookings.employee_id', '=', 'employees.id')
              ->join('users', 'bookings.user_id', '=', 'users.id')
              ->select('bookings.*', 'employees.name', 'users.name AS user')
              ->get();

      return view('bookingsum', [
        'bookings' => $bookings,
      ]);
    }

    public function ViewAvailableBooking() {
      $employees = DB::select('SELECT * FROM employees');
      $availability = DB::select('SELECT * FROM employee_times');

      return view('viewAvailableTime', [
        'employees' => $employees,
        'availability' => $availability,
      ]);
    }
}
