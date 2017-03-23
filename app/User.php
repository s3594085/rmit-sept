<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    /*
     *  User role function
    */
    public function roles() {
      return $this->belongsToMany('Role', 'users_roles');
    }

    public function isOwner() {
      $roles = $this->roles->toArray();
      return !empty($roles);
    }

    public function hasRole($check) {
      return in_array($check, array_fetch($this->roles->toArray(), 'name'));
    }

    public function getIdInArray($array, $term) {
      foreach ($array as $key => $value) {
        if ($value == $term) {
          return $key;
        }
      }
      throw new UnexpectedValueException;
    }

    public function makeOwner($title) {
      $assigned_roles = $title;

      $roles = array_fetch(Role::all()->toArray(), 'name');

      if ($title == 'admin') {
        $assigned_roles[] = $this->getIdInArray($roles, 'createOwner');
        $assigned_roles[] = $this->getIdInArray($roles, 'deleteOwner');
      } elseif ($title == 'owner') {
        $assigned_roles[] = $this->getIdInArray($roles, 'createEmployee');
        $assigned_roles[] = $this->getIdInArray($roles, 'deleteEmployee');
      } else {
        throw new \Exception("The title entered does not exist");
      }

      $this->roles()->attach($assigned_roles);
    }
}
