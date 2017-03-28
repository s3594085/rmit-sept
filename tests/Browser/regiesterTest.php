<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class regiesterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    // test on register new user
    public function testRegisterUser()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                    ->assertSee('Register')
                    ->type('name', 'test')
                    ->type('email', 'test@test.com')
                    ->type('mobile', '0123456789')
                    ->type('street', 'test st')
                    ->type('city', 'test city')
                    ->type('password', 'testpassword')
                    ->type('password_confirmation', 'testpassword')
                    ->press('register')
                    ->assertSee('Dashboard');
        });
    }
}
