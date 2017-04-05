<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'street', 'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function validator(array $data) {
      $messages = ['password.regex' => "Your password must contain atleast 8 character, 1 lower case character, 1 upper case character and 1 digit."];
      return Validator::make($data, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|confirmed|min:8|regex:/^(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
          'mobile' => 'required|regex:/^04[0-9]{8}$/',
          'street' => 'required|max:255',
          'city' => 'required|max:255',
      ],$messages);
    }

    public function booking() {
      return $this->hasMany(Booking::class);
    }
}

?>
