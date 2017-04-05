<?php

namespace Tests\Feature;

use App\User;
use App\Employee;
use App\Booking;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddBookingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testBookingCanBeCreated()
    {
      $user = factory(User::class)->create();
      $employee = factory(Employee::class)->create();

      $booking = $user->booking()->create([
          'date' => date("Ymd"),
          'start' => '09:00:00',
          'end' => '20:00:00',
          'employee_id' => $employee->id,
      ]);

      $found_Booking = Booking::find(1);

      $this->assertEquals($found_Booking->date, date("Ymd"));
      $this->assertEquals($found_Booking->start, '09:00:00');

      $this->assertDatabaseHas('bookings', [
        'id' => '1',
        'employee_id' => '1',
        'date' => date("Ymd"),
      ]);
    }
}
