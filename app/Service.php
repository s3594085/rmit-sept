<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Service extends Model
{
  protected $fillable = [
    'name', 'duration',
  ];

  public static function validator(array $data) {
    $messages = ['name.regex' => "The name may only contain letters and spaces."];
    return Validator::make($data, [
        'name' => 'required|max:255|regex:/^[a-zA-Z ]*$/',
        'duration' => 'required',
    ], $messages);
  }
}
