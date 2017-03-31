<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bookingsumController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('owner');
    }

    public function index() {
     return view('bookingsum');
       }
}
