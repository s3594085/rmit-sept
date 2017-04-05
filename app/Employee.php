<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Employee extends Model
{
    //
    protected $fillable = [
      'name', 'email', 'mobile', 'street', 'city',
    ];

    public static function validator(array $data) {
      $messages = ['mobile.regex' => "Please enter a valid mobile number. Eg. 0412345678"];
      return Validator::make($data, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:employees',
          'mobile' => 'required|regex:/^04[0-9]{8}$/',
          'street' => 'required|max:255',
          'city' => 'required|max:255',
      ],$messages);
    }

    public function workingTime() {
      return $this->hasMany(EmployeeTime::class);
    }
}
