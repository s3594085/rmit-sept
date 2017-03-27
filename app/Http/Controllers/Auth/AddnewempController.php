<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddnewempController extends Controller
{
    //
    public function index()
    {
      return View('addnewemp');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'mobile' => 'required|regex:/^04[0-9]{8}$/',
        ],$messages);
    }
}
