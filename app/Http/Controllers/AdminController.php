<?php

namespace App\Http\Controllers;

use Auth;
use URL;
use Session;

use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{

  public function __construct()
  {
    $this->middleware('admin');
  }

  /**
  * Show the application owner registration form.
  */
  public function addOwner()
  {
    $businesses = DB::select('SELECT * FROM businesses');

    return view('addowner', [
      'businesses' => $businesses,
    ]);
  }

  public function manageOwner() {
    $users = DB::table('users')
            ->join('businesses', 'users.business', '=', 'businesses.id')
            ->select('users.*', 'businesses.name AS business_name')
            ->where('users.owner', '=', 1)
            ->get();

    return view('manageowner', [
      'users' => $users,
    ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return User
  */
  protected function create(Request $data)
  {
    $valid = User::validator($data->all());

    if ($valid->passes()) {
      User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'mobile' => $data['mobile'],
        'street' => $data['street'],
        'city' => $data['city'],
        'business' => $data['business'],
        'owner' => 1,
      ]);

      Session::flash('success', $data['name'] . " successful created!");
      return redirect(route('add_owner'));
    } else {
      return redirect(route('add_owner'))->withErrors($valid)->withInput();
    }
  }
}
