<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class LoginTest extends TestCase
{
  /**
  * A basic test example.
  *
  * @return void
  */

  use DatabaseMigrations;


  public function createUser() {

    $user = factory(User::class)->create(
      [
        'name' => 'Jane',
        'email' => 'test@test.com',
        'mobile' => '041234567',
        'street' => 'test st',
        'city' => 'test city',
        'password' => bcrypt('testpassword'),]);

        return $user;
      }

      public function testLoginFormShows()
      {
        $response = $this->call('GET','login');
        $this->assertTrue($response->isOk());
      }

      public function testInvalidAccountLogin(){
        $User=[
          'email' => 'test@test.com',
          'password' => 'testpassword'
        ];
        $response = $this->call('POST','login',$User);
        $this->assertFalse($response->isok());
      }

      public function testInvalidPasswordLogin(){
        $Account = $this->createUser();
        $User=[
          'email' => 'test@test.com',
          'password' => 'wrongpassword'
        ];
        $response = $this->call('POST','login', $User);
        $this->assertFalse($response->isOk());
      }
    }
