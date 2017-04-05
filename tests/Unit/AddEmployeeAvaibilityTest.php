<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\EmployeeTime;

class AddEmployeeAvaibilityTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function test_all_valid_input()
    {
      $input = array(
        'day' => 'Monday',
        'start' => '09:00',
        'end' => '18:00',
      );

      $add = EmployeeTime::validator($input);
      $this->assertTrue($add->passes());
    }

    public function test_empty_input()
    {
      $input = array();

      $add = EmployeeTime::validator($input);
      $this->assertTrue($add->fails());
    }

    public function test_empty_day()
    {
      $input = array(
        'day' => '',
        'start' => '09:00',
        'end' => '18:00',
      );

      $add = EmployeeTime::validator($input);
      $this->assertTrue($add->fails());
    }

    public function test_empty_start_time()
    {
      $input = array(
        'day' => 'Monday',
        'start' => '',
        'end' => '18:00',
      );

      $add = EmployeeTime::validator($input);
      $this->assertTrue($add->fails());
    }

    public function test_empty_end_time()
    {
      $input = array(
        'day' => 'Monday',
        'start' => '09:00',
        'end' => '',
      );

      $add = EmployeeTime::validator($input);
      $this->assertTrue($add->fails());
    }

    public function test_invalid_start_time()
    {
      $input = array(
        'day' => 'Monday',
        'start' => 'asdasdasd',
        'end' => '18:00',
      );

      $add = EmployeeTime::validator($input);
      $this->assertTrue($add->fails());
    }

    public function test_invalid_end_time()
    {
      $input = array(
        'day' => 'Monday',
        'start' => '09:00',
        'end' => 'asdasdasd',
      );

      $add = EmployeeTime::validator($input);
      $this->assertTrue($add->fails());
    }
}
