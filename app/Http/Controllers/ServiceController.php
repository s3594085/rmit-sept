<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Session;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
  public function __construct()
  {
      $this->middleware('owner');
  }

  //Add new employee views
  public function addServices() {
    return view('addservice');
  }

  public function createServices(Request $data) {
    $valid = Service::validator($data->all());

    $duration = $data['duration'];
    sscanf($duration, "%d:%d", $hours, $minutes);
    $time_seconds = $hours * 3600 + $minutes * 60;

    if ($valid->passes()) {
      Service::create([
          'name' => $data['name'],
          'duration' => $time_seconds,
      ]);

      Session::flash('success', $data['name'] . " successful created!");
      return redirect(route('add_services'));
    } else {
      return redirect(route('add_services'))->withErrors($valid)->withInput();
    }
  }

  public function viewServices() {
    $services = DB::select('SELECT * FROM services');

    return view('viewservices', [
      'services' => $services,
    ]);
  }

}
