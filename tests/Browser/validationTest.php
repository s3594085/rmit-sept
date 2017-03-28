<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class validationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group validationTest
     * @return void
     */

    use DatabaseMigrations;

    public function createUser() {

      $user = factory(User::class)->create(
        ['email' => 'test@test.com',
        'mobile' => '041234567',
        'street' => 'test st',
        'city' => 'test city',
        'password' => bcrypt('testpassword'),]);

      return $user;
    }


    // validation test on login
    public function testWrongEmailPassword()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'wrong@email.com')
                    ->type('password', 'wrong password')
                    ->press('login')
                    ->assertSee('These credentials do not match our records.');
        });
    }

    // validation test on create user
    public function testRegisterValidation()
    {
        $user = $this->createUser();

        $this->browse(function ($browser) use($user) {
            $browser->visit('/register')
                    ->type('name', 'tester')
                    ->type('email', 'new@test.com')
                    ->type('mobile', '0123456789')
                    ->type('street', 'test st')
                    ->type('city', 'test city')

                    //Test Confirm Password and Password does't match
                    ->type('password', 'testpassword')
                    ->type('password_confirmation', 'wrong testpassword')
                    ->press('register')
                    ->assertSee('The password confirmation does not match.')

                    //Test registering existing user
                    ->type('email', $user->email)
                    ->type('password', 'testpassword')
                    ->type('password_confirmation', 'testpassword')
                    ->press('register')
                    ->assertSee('The email has already been taken.');
        });
    }

}
