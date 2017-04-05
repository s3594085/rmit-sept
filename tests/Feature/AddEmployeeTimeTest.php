<?php

namespace Tests\Feature;

use App\Employee;
use App\EmployeeTime;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddEmployeeTimeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testEmployeeTimeCanBeCreated()
    {
      $employee = factory(Employee::class)->create();

      $time = $employee->workingTime()->create([
          'day' => 'Monday',
          'start' => '09:00:00',
          'end' => '20:00:00',
      ]);

      $found_WorkingTime = EmployeeTime::find(1);

      $this->assertEquals($found_WorkingTime->day, 'Monday');
      $this->assertEquals($found_WorkingTime->start, '09:00:00');

      $this->assertDatabaseHas('employee_times', [
        'id' => '1',
        'employee_id' => '1',
        'day' => 'Monday',
      ]);
    }

    public function testEmployeeTimeCanBeDeleted() {
      $employee = factory(Employee::class)->create();

      $employee->workingTime()->delete();

      $this->assertDatabaseMissing('employee_times', [
        'id' => '1',
        'employee_id' => '1',
        'day' => 'M',
      ]);

    }
}
