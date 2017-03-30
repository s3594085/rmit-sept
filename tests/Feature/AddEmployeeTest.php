<?php

namespace Tests\Feature;

use App\Employee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddEmployeeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function createEmployee() {
      return $employee = factory(Employee::class)->create([
                'name' => 'Worker',
                'email' => 'worker@test.com',
                'mobile' => '0415891981',
                'street' => 'st',
                'city' => 'city',
              ]);
    }

    public function testEmployeeCanBeDeleted() {
      $employee = $this->createEmployee();

      $employee->delete();

      $this->assertDatabaseMissing('employees', [
        'id' => 1,
        'name' => 'Worker',
        'email' => 'worker@test.com',
      ]);

    }

    public function testEmployeeCanBeCreated()
    {
        $employee = $this->createEmployee();

        $found_employee = Employee::find(1);

        $this->assertEquals($found_employee->name, 'Worker');
        $this->assertEquals($found_employee->email, 'worker@test.com');

        $this->assertDatabaseHas('employees', [
          'id' => 1,
          'name' => 'Worker',
          'email' => 'worker@test.com',
        ]);
    }

    public function testEmployeeInfoCanBeUpdated() {

    }
}
