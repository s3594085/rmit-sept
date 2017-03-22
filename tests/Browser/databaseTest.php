<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class databaseTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group testDatabase
     * @return void
     */

    use DatabaseMigrations;

    public function createUser() {
      $user = factory(User::class)->create(
        ['email' => 'test@test.com',
        'mobile' => '041234567',
        'street' => 'test st',
        'city' => 'test city',
        'password' => bcrypt('testpassword'),]);

      return $user;
    }


    // test on querying database
    public function testDatabase()
    {
      $user = $this->createUser();

      $this->assertDatabaseHas('users', [
          'email' => $user->email,
          'mobile' => $user->mobile
      ]);
    }
}
