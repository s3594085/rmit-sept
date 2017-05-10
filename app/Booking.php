<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Booking extends Model
{
  protected $fillable = [
    'date', 'start', 'end', 'employee_id', 'service_id',
  ];

  public static function validator(array $data) {
    return Validator::make($data, [
      'date' => 'required',
      'start' => 'required',
      'end' => 'required',
      'employee_id' => 'required',
      'service_id' => 'required',
    ]);
  }
}
