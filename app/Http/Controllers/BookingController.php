<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner', ['only' => ['viewAllBooking']]);
    }

    public function create(Request $data) {
      $this->validate($data, [
          'date' => 'required',
          'start' => 'required',
          'end' => 'required',
          'employee_id' => 'required',
      ]);

      $user = User::find(Auth::user()->id);

      $user->booking()->create([
        'date' => $data['date'],
        'start' => $data['start'],
        'end' => $data['end'],
        'employee_id' => $data['employee_id'],
      ]);

      //Session::flash('success', "Time : " . $data['start'] . " to " . $data['end'] . " successful added!");
      //return redirect(URL::previous());
      return redirect('/debug');
    }

    public function viewAllBooking() {
      //$bookings = DB::select('SELECT * FROM bookings');
      $bookings = DB::table('bookings')
              ->join('employees', 'bookings.employee_id', '=', 'employees.id')
              ->join('users', 'bookings.user_id', '=', 'users.id')
              ->select('bookings.*', 'employees.name', 'users.name AS user')
              ->get();

      return view('bookingsum', [
        'bookings' => $bookings,
      ]);
    }
}
