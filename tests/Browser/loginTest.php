<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function createUser() {

      $user = factory(User::class)->create(
        ['email' => 'hello@test.com',
        'mobile' => '041234567',
        'street' => 'test st',
        'city' => 'test city',
        'password' => bcrypt('testpassword'),]);

      return $user;
    }

    // visit login path test
    public function testVisitLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->assertSee('Login')
                    ->assertPathIs('/login');
        });
    }

    public function testLogin(){
      $user = $this->createUser();
      $this->browse(function ($browser){
          $browser->visit('/login')
                  ->type('email','hello@test.com')
                  ->type('password','testpassword')
                  ->press('login')
                  ->assertPathIs('/home')
                  ->assertSee('Dashboard');
      });
    }

    public function testInvalidUserLogin(){

      $this->browse(function ($browser) {
          $browser->visit('/login')
                  ->type('email','jan@qq.com')
                  ->type('password','testpassword')
                  ->press('login')
                  ->assertSee('These credentials do not match our records.');
      });
    }
}
