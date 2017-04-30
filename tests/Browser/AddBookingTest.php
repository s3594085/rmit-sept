<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddBookingTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     use DatabaseMigrations;

     public function testVisitBooking()
     {
         $this->artisan("db:seed");

         $this->browse(function ($browser) {
             $browser->loginAs(User::find(1))
                     ->visit('/viewavailablebooking/1')
                     ->assertSee('View Booking Availability');
         });
     }

     public function testBooking()
     {
         $this->artisan("db:seed");

         $this->browse(function ($browser) {
             $browser->loginAs(User::find(1))
                    //Create Service
                     ->visit('/addServices')
                     ->type('name', 'Hair Cut')
                     ->type('duration', '00:30')
                     ->press('submit')
                     ->assertSee('successful created!')

                     //Create Employee
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
                     ->assertSee('successful added!')

                     //Add Booking
                     ->visit('/viewavailablebooking/1')
                     ->press('book')
                     ->assertSee('successful added!');
         });
     }

}
