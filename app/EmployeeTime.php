<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class EmployeeTime extends Model
{
    //
    protected $fillable = [
      'day', 'start', 'end',
    ];

    public static function validator(array $data) {
      return Validator::make($data, [
          'day' => 'required',
          'start' => 'required|date_format:H:i',
          'end' => 'required|date_format:H:i',
      ]);
    }
}
