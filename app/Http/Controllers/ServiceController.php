<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Session;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
  //Only allow owner to access ServiceController
  public function __construct()
  {
      $this->middleware('owner');
  }

  //Add new services views
  public function addServices() {
    return view('addservice');
  }

  //Create Service function
  public function createServices(Request $data) {
    $valid = Service::validator($data->all());

    $duration = $data['duration'];
    sscanf($duration, "%d:%d", $hours, $minutes);
    $time_seconds = $hours * 3600 + $minutes * 60;

    if ($valid->passes()) {
      Service::create([
          'name' => $data['name'],
          'duration' => $time_seconds,
          'business_id' => session('business'),
      ]);

      Session::flash('success', $data['name'] . " successful created!");
      return redirect(route('add_services'));
    } else {
      return redirect(route('add_services'))->withErrors($valid)->withInput();
    }
  }

  //List all services view
  public function viewServices() {
    $services = DB::select('SELECT * FROM services WHERE business_id = ?', [session('business')]);

    return view('viewservices', [
      'services' => $services,
    ]);
  }

}
