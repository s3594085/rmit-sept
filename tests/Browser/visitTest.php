<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class visitTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
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

    public function testVisitRegister()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                    ->assertSee('Register');
        });
    }

    public function testVisitLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->assertSee('Login');
        });
    }

    public function testVisitDashboard()
    {
        $user = $this->createUser();

        $this->browse(function ($browser) use($user) {
            $browser->visit('/')
                    ->type('email', $user->email)
                    ->type('password', 'testpassword')
                    ->press('login')
                    ->assertSee('Dashboard');
        });
    }

    public function testLoginRedirection()
    {
        $user = $this->createUser();

        $this->actingAs($user);

        $this->browse(function ($browser) use($user) {
            //Visit register or login page when logged in
            $browser->visit('/login')
                    ->assertSee('Dashboard')
                    ->visit('/register')
                    ->assertSee('Dashboard');
        });

    }
}
