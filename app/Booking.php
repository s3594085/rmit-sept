<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  protected $fillable = [
    'date', 'start', 'end', 'employee_id',
  ];
}
