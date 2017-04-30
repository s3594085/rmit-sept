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
    return Validator::make($data, [
        'name' => 'required|max:255',
        'duration' => 'required',
    ]);
  }
}
