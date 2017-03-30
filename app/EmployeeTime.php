<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTime extends Model
{
    //
    protected $fillable = [
      'day', 'start', 'end',
    ];
}
