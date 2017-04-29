<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Service;

class createServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

     use DatabaseMigrations;


     public function createService(){
       return $Account = Service::create([
         'name' => 'Hair Coloring',
         'duration' => '10:00',
       ]);
     }


    public function testValidAdd()
    {
        $input = array(
          'name' => 'men cut',
          'duration' => '10',
        );

        $service = Service::validator($input);
        $this->assertTrue($service->passes());
    }

    public function testEmptyInput()
    {
      $input = array();

      $add = Service::validator($input);
      $this->assertTrue($add->fails());
    }

    public function testEmptyName()
    {
      $input = array(
        'name' => '',
        'duration' => '10:00',
      );

      $add = Service::validator($input);
      $this->assertTrue($add->fails());
    }


    public function testEmptyDuration()
    {
      $input = array(
        'name' => 'men cut',
        'duration' => '',
      );

      $add = Service::validator($input);
      $this->assertTrue($add->fails());
    }

    public function testInvalidServiceDuration()
    {
      $input = array(
        'name' => 'men cut',
        'duration' => 'yeah',
      );

      $add = Service::validator($input);
      $this->assertTrue($add->fails());
    }

    public function testServiceCanBeCreated()
      {
          $Account = $this->createService();
          $found_Account = Service::find(1);

          $this->assertEquals($found_Account->name, 'Hair Coloring');
          $this->assertEquals($found_Account->duration, '10:00');

          $this->assertDatabaseHas('services', [
            'id' => 1,
            'name' => 'Hair Coloring',
            'duration' => '10:00',
      ]);
}

}
