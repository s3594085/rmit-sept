<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Business;

use Session;

class BusinessController extends Controller
{
  //Only allow admin to access BusinessController
  public function __construct()
  {
    $this->middleware('admin');
  }

  //Add new business views
  public function addBusiness() {
    $owners = DB::select('SELECT * FROM users WHERE owner = ?', [1]);

    return view('addbusiness', [
      'owners' => $owners,
    ]);
  }

  //Manage business view
  public function manageBusiness() {
    $businesses = DB::select('SELECT * FROM businesses');

    return view('managebusiness', [
      'businesses' => $businesses,
    ]);
  }

  //Create business function
  public function createBusiness(Request $data) {
    $valid = Business::validator($data->all());

    if ($valid->passes()) {
      Business::create([
          'name' => $data['name'],
          'mobile' => $data['mobile'],
          'street' => $data['street'],
          'city' => $data['city'],
          'start' => $data['start'],
          'end' => $data['end'],
      ]);

      Session::flash('success', $data['name'] . " successful created!");
      return redirect(route('add_business'));
    } else {
      return redirect(route('add_business'))->withErrors($valid)->withInput();
    }

  }
}
