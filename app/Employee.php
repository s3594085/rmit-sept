<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
      'name', 'email', 'mobile', 'street', 'city',
    ];

    public function workingTime() {
      return $this->hasMany(EmployeeTime::class);
    }
}
