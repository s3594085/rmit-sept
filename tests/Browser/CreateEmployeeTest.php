<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateEmployeeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testVisitCreateEmployee()
    {
        $this->artisan("db:seed");

        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/addemployee')
                    ->assertSee('Add New Employees');
        });
    }

    public function testVisitManageEmployee()
    {
        $this->artisan("db:seed");

        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/manageemployee')
                    ->assertSee('Manage Employees');
        });
    }

    public function testCreateEmployee()
    {
        $this->artisan("db:seed");

        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/addemployee')
                    ->type('name', 'Worker')
                    ->type('mobile', '0415123123')
                    ->type('email', 'valid@email.com')
                    ->type('street', 'Valid St')
                    ->type('city', 'Valid Ct')
                    ->press('submit')
                    ->assertSee('successful created!');
        });
    }

    public function testCreateInvalidEmployeeName()
    {
        $this->artisan("db:seed");

        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/addemployee')
                    ->type('name', '123456789')
                    ->type('mobile', '0415123123')
                    ->type('email', 'valid@email.com')
                    ->type('street', 'Valid St')
                    ->type('city', 'Valid Ct')
                    ->press('submit')
                    ->assertSee('The name may only contain letters and spaces.');
        });
    }

    public function testCreateInvalidEmployeeMobile()
    {
        $this->artisan("db:seed");

        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/addemployee')
                    ->type('name', 'Worker')
                    ->type('mobile', '12134567')
                    ->type('email', 'valid@email.com')
                    ->type('street', 'Valid St')
                    ->type('city', 'Valid Ct')
                    ->press('submit')
                    ->assertSee('Please enter a valid mobile number. Eg. 0412345678');
        });
    }

    public function testCreateAvaibility()
    {
        $this->artisan("db:seed");

        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                //Add Employee for Availability
                ->visit('/addemployee')
                ->type('name', 'Worker')
                ->type('mobile', '0415123123')
                ->type('email', 'valid@email.com')
                ->type('street', 'Valid St')
                ->type('city', 'Valid Ct')
                ->press('submit')
                ->assertSee('successful created!')

                //Add Availability
                ->visit('/employee/1')
                ->type('start', '09:00')
                ->type('end', '12:00')
                ->press('submit')
                ->assertSee('successful added!');
        });
    }


}
