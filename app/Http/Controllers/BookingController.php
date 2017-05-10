<?php

namespace App\Http\Controllers;

use App\User;
use App\Booking;
use Auth;
use URL;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Service;

class BookingController extends Controller
{
    //Only authenticated user can access Booking controller
    public function __construct()
    {
        $this->middleware('auth');

        //only owner can access viewAllBooking function
        $this->middleware('owner', [
          'only' => ['viewAllBooking'],
          'only' => ['CustomerBooking'],

        ]);
    }

    //User create booking function
    public function createBooking(Request $data) {
      $valid = Booking::validator($data->all());

      if ($valid->passes()) {
        $user = User::find(Auth::user()->id);

        $user->booking()->create([
          'date' => $data['date'][$data['book']],
          'start' => $data['start'][$data['book']],
          'end' => $data['end'][$data['book']],
          'employee_id' => $data['employee_id'][$data['book']],
          'service_id' => $data['service_id'][$data['book']],
        ]);

        Session::flash('success', "Booking successful added!");
        return redirect(URL::previous());
      } else {
        return redirect(URL::previous())->withErrors($valid)->withInput();
      }
    }

    //Onwer create user booking function
    public function createCustomerBooking(Request $data) {
      $valid = Booking::validator($data->all());

      if ($valid->passes()) {
        $user = User::find($data['user'][$data['book']]);

        $user->booking()->create([
          'date' => $data['date'][$data['book']],
          'start' => $data['start'][$data['book']],
          'end' => $data['end'][$data['book']],
          'employee_id' => $data['employee_id'][$data['book']],
          'service_id' => $data['service_id'][$data['book']],
        ]);

        Session::flash('success', "Booking successful added!");
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
              ->join('services', 'bookings.service_id', '=', 'services.id')
              ->select('bookings.*', 'employees.name', 'users.name AS user', 'services.name AS service')
              ->get();

      return view('bookingsum', [
        'bookings' => $bookings,
      ]);
    }

    //Customer view own bookings
    public function viewMyBooking() {
      $bookings = DB::table('bookings')
              ->join('employees', 'bookings.employee_id', '=', 'employees.id')
              ->join('users', 'bookings.user_id', '=', 'users.id')
              ->join('services', 'bookings.service_id', '=', 'services.id')
              ->select('bookings.*', 'employees.name', 'users.name AS user', 'services.name AS service')
              ->where('bookings.user_id', '=', Auth::user()->id)
              ->get();

      return view('mybooking', [
        'bookings' => $bookings,
      ]);
    }

    //Customer view all available booking
    public function ViewAvailableBooking(Request $data, $id) {
      $employees = DB::select('SELECT * FROM employees');
      $availability = DB::select('SELECT * FROM employee_times');
      $services = DB::select('SELECT * FROM services');
      $bookings = DB::select('SELECT * FROM bookings');
      $single_service = Service::find($id);

      return view('viewAvailableTime', [
        'employees' => $employees,
        'availability' => $availability,
        'services' => $services,
        'id' => $id,
        'single_service' => $single_service,
        'bookings' => $bookings,
      ]);
    }

    //Owner view all available booking for customer
    public function CustomerBooking(Request $data, $id) {
      $employees = DB::select('SELECT * FROM employees');
      $availability = DB::select('SELECT * FROM employee_times');
      $services = DB::select('SELECT * FROM services');
      $bookings = DB::select('SELECT * FROM bookings');
      $users = DB::select('SELECT * FROM users');
      $single_service = Service::find($id);

      return view('customerBooking', [
        'employees' => $employees,
        'availability' => $availability,
        'services' => $services,
        'id' => $id,
        'single_service' => $single_service,
        'bookings' => $bookings,
        'users' => $users,
      ]);
    }
}
