<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class registeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function createUser() {

      $user = factory(User::class)->create(
        ['email' => 'chen@qq.com',
        'mobile' => '0410593115',
        'street' => 'plenty st',
        'city' => 'melbourne',
        'password' => bcrypt('chen.!'),]);

      return $user;
    }

    public function testRegiste()
    {
      $user = $this->createUser();

      $this->browse(function ($browser) use($user) {
          $browser->visit('/register')
                  ->type('name', 'chen')
                  ->type('email', 'chen@qq.com')
                  ->type('mobile', '0410593115')
                  ->type('street', 'plenty st')
                  ->type('city', 'melbourne')

                //If password don't match
                  ->type('password', 'chen.!')
                  ->type('password_confirmation', 'chenn.!')
                  ->press('register')
                  ->assertSee('The password confirmation does not match.')

                //if user has registed already.
                  ->type('email', $user->email)
                  ->type('password', 'chen.!')
                  ->type('password_confirmation', 'chen.!')
                  ->press('register')
                  ->assertSee('The email has already been taken.');
        });
    }
}
