<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class visitTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group testVisit
     * @return void
     */

    use DatabaseMigrations;


    // User class create() to create a user
    // make() to create random user
    public function createUser() {
      $user = factory(User::class)->create(
        ['email' => 'test@test.com',
        'mobile' => '041234567',
        'street' => 'test st',
        'city' => 'test city',
        'password' => bcrypt('testpassword'),]);

      return $user;
    }

    // visit register path test
    public function testVisitRegister()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                    ->assertSee('Register')
                    ->assertPathIs('/register');
        });
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

    // login to home path
    public function testVisitDashboard()
    {
        $user = $this->createUser();

        $this->browse(function ($browser) use($user) {
            $browser->visit('/home')
                    ->type('email', $user->email)
                    ->type('password', 'testpassword')
                    ->press('login')
                    ->assertSee('Dashboard')
                    ->assertPathIs('/home');
        });
    }

    public function testLoginRedirection()
    {
        $user = $this->createUser();

        // mock user session
        $this->actingAs($user);

        $this->browse(function ($browser) use($user) {
            //Visit register or login page when logged in
            $browser->visit('/login')
                    ->assertSee('Dashboard')
                    ->visit('/register')
                    ->assertSee('Dashboard');
        });

    }
/*
    public function testVisitOwnerPage()
    {
        $user = $this->createUser();
        $user->makeOwner('owner');

        // mock user session
        $this->actingAs($user);

        $this->browse(function ($browser) use($user) {
            //Visit register or login page when logged in
            $browser->visit('/home')
                    ->assertSee('Owner Page');
        });
*/
    
}
