<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Business extends Model
{
  protected $fillable = [
    'name', 'mobile', 'street', 'city', 'start', 'end',
  ];

  public static function validator(array $data) {
    return Validator::make($data, [
      'name' => 'required|unique:businesses',
      'mobile' => 'required|unique:businesses',
      'street' => 'required',
      'city' => 'required',
      'start' => 'required',
      'end' => 'required',
    ]);
  }
}
