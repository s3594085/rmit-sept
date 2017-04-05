<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class RegisterValidateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testVisitRegister()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_all_valid_input()
    {
        $input = array(
          'name' => 'Test Name',
          'email' => 'test@email.com',
          'mobile' => '0405411752',
          'street' => '8 Franklin St',
          'city' => 'Melbourne',
          'password' => 'Password123',
          'password_confirmation' => 'Password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->passes());
    }

    public function test_empty_name()
    {
        $input = array(
          'name' => '',
          'email' => 'test@email.com',
          'mobile' => '0405411752',
          'street' => '8 Franklin St',
          'city' => 'Melbourne',
          'password' => 'Password123',
          'password_confirmation' => 'Password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->fails());
    }

    public function test_invalid_email()
    {
        $input = array(
          'name' => 'Test Name',
          'email' => 'fake.com',
          'mobile' => '0405411752',
          'street' => '8 Franklin St',
          'city' => 'Melbourne',
          'password' => 'Password123',
          'password_confirmation' => 'Password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->fails());
    }

    public function test_empty_email()
    {
        $input = array(
          'name' => 'Test Name',
          'email' => '',
          'mobile' => '0405411752',
          'street' => '8 Franklin St',
          'city' => 'Melbourne',
          'password' => 'Password123',
          'password_confirmation' => 'Password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->fails());
    }

    public function test_invalid_mobile()
    {
        $input = array(
          'name' => 'Test Name',
          'email' => 'test@email.com',
          'mobile' => '-',
          'street' => '8 Franklin St',
          'city' => 'Melbourne',
          'password' => 'Password123',
          'password_confirmation' => 'Password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->fails());
    }

    public function test_empty_mobile()
    {
        $input = array(
          'name' => 'Test Name',
          'email' => 'test@email.com',
          'mobile' => '',
          'street' => '8 Franklin St',
          'city' => 'Melbourne',
          'password' => 'Password123',
          'password_confirmation' => 'Password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->fails());
    }

    public function test_empty_street()
    {
        $input = array(
          'name' => 'Test Name',
          'email' => 'test@email.com',
          'mobile' => '0405411752',
          'street' => '',
          'city' => 'Melbourne',
          'password' => 'Password123',
          'password_confirmation' => 'Password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->fails());
    }

    public function test_empty_city()
    {
        $input = array(
          'name' => 'Test Name',
          'email' => 'test@email.com',
          'mobile' => '0405411752',
          'street' => '8 Franklin St',
          'city' => '',
          'password' => 'Password123',
          'password_confirmation' => 'Password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->fails());
    }

    public function test_empty_password()
    {
        $input = array(
          'name' => 'Test Name',
          'email' => 'test@email.com',
          'mobile' => '0405411752',
          'street' => '8 Franklin St',
          'city' => 'Melbourne',
          'password' => '',
          'password_confirmation' => 'Password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->fails());
    }

    public function test_lowercase_password()
    {
        $input = array(
          'name' => 'Test Name',
          'email' => 'test@email.com',
          'mobile' => '0405411752',
          'street' => '8 Franklin St',
          'city' => 'Melbourne',
          'password' => 'password123',
          'password_confirmation' => 'Password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->fails());
    }

    public function test_uppercase_password()
    {
        $input = array(
          'name' => 'Test Name',
          'email' => 'test@email.com',
          'mobile' => '0405411752',
          'street' => '8 Franklin St',
          'city' => 'Melbourne',
          'password' => 'PASSWORD123',
          'password_confirmation' => 'Password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->fails());
    }

    public function test_matchn_password()
    {
        $input = array(
          'name' => 'Test Name',
          'email' => 'test@email.com',
          'mobile' => '0405411752',
          'street' => '8 Franklin St',
          'city' => 'Melbourne',
          'password' => 'Password123',
          'password_confirmation' => 'password123',
        );

        $register = User::validator($input);
        $this->assertTrue($register->fails());
    }

}
