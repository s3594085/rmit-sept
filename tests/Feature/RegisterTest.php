<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function createAccount(){
      return $Account = factory(User::class)->create([
        'name' => 'Jane',
        'email' => 'Jane@gmail.com',
        'password' => bcrypt('123Jane456'),
        'mobile' => '0410593116',
        'street' => 'Plenty Rd',
        'city' => 'NY',
      ]);
    }

    public function createInvalidPasswordAccount(){
      return $Account = factory(User::class)->create([
        'name' => 'Jane',
        'email' => 'Jane@gmail.com',
        'password' => bcrypt('123'),
        'mobile' => '0410593116',
        'street' => 'Plenty Rd',
        'city' => 'NY',
      ]);
    }

    public function testAccountCanBeCreated()
    {
        $Account = $this->createAccount();
        $found_Account = User::find(1);

        $this->assertEquals($found_Account->name, 'Jane');
        $this->assertEquals($found_Account->email, 'Jane@gmail.com');

        $this->assertDatabaseHas('users', [
          'id' => 1,
          'name' => 'Jane',
          'email' => 'Jane@gmail.com',
        ]);
    }
    


}
