<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateServiceTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testVisitCreateService()
    {
        $this->artisan("db:seed");

        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/addServices')
                    ->assertSee('Add New Services');
        });
    }

    public function testVisitViewService()
    {
        $this->artisan("db:seed");

        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/viewServices')
                    ->assertSee('View Services');
        });
    }

    public function testCreateService()
    {
        $this->artisan("db:seed");

        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/addServices')
                    ->type('name', 'Hair Cut')
                    ->type('duration', '00:30')
                    ->press('submit')
                    ->assertSee('successful created!');
        });
    }

    public function testInvalidName()
    {
        $this->artisan("db:seed");

        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/addServices')
                    ->type('name', '123123')
                    ->type('duration', '00:30')
                    ->press('submit')
                    ->assertSee('The name may only contain letters and spaces.');
        });
    }
}
