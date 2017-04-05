<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Employee;

class AddEmployeeTest extends TestCase
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
          'name' => 'Worker',
          'email' => 'worker@test.com',
          'mobile' => '0412345678',
          'street' => 'Working St',
          'city' => 'Working Ct',
        );

        $add = Employee::validator($input);
        $this->assertTrue($add->passes());
    }

    public function test_empty_input()
    {
        $input = array();

        $add = Employee::validator($input);
        $this->assertTrue($add->fails());
    }

    public function test_invalid_email()
    {
        $input = array(
          'name' => 'Worker',
          'email' => 'fakecom',
          'mobile' => '0412345678',
          'street' => 'Working St',
          'city' => 'Working Ct',
        );

        $add = Employee::validator($input);
        $this->assertTrue($add->fails());
    }

    public function test_invalid_mobile()
    {
        $input = array(
          'name' => 'Worker',
          'email' => 'worker@test.com',
          'mobile' => '012345678',
          'street' => 'Working St',
          'city' => 'Working Ct',
        );

        $add = Employee::validator($input);
        $this->assertTrue($add->fails());
    }

    public function test_invalid_name()
    {
        $input = array(
          'name' => 'asddasdasdddasdasdasasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdjlkajslkdjalksjdlkajslkdjalskjdlajsldjlasjdlkajsldkjlasjdljalskjdlajsldjlajsdlajlsdjklajsldjalsjdljalsjdlajsldjlajsldjalsjdljalsjdljasljdlajsldjalsjdljalsjdlajsldjlajsldjalsjdlajsldjalsjdlajsldjalsjdlajsldjlajsdljalsjdlalsjdlajsldjl',
          'email' => 'worker@test.com',
          'mobile' => '0412345678',
          'street' => 'Working St',
          'city' => 'Working Ct',
        );

        $add = Employee::validator($input);
        $this->assertTrue($add->fails());
    }

    public function test_empty_name()
    {
        $input = array(
          'name' => '',
          'email' => 'worker@test.com',
          'mobile' => '0412345678',
          'street' => 'Working St',
          'city' => 'Working Ct',
        );

        $add = Employee::validator($input);
        $this->assertTrue($add->fails());
    }

    public function test_empty_mobile()
    {
        $input = array(
          'name' => 'Worker',
          'email' => 'worker@test.com',
          'mobile' => '',
          'street' => 'Working St',
          'city' => 'Working Ct',
        );

        $add = Employee::validator($input);
        $this->assertTrue($add->fails());
    }

    public function test_empty_street()
    {
        $input = array(
          'name' => 'Worker',
          'email' => 'worker@test.com',
          'mobile' => '0412345678',
          'street' => '',
          'city' => 'Working Ct',
        );

        $add = Employee::validator($input);
        $this->assertTrue($add->fails());
    }

    public function test_empty_city()
    {
        $input = array(
          'name' => 'Worker',
          'email' => 'worker@test.com',
          'mobile' => '0412345678',
          'street' => 'Working St',
          'city' => '',
        );

        $add = Employee::validator($input);
        $this->assertTrue($add->fails());
    }
}
