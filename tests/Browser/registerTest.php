<?php

namespace Tests\Browser;


use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class registerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     use DatabaseMigrations;


     public function createUser() {

     $user = factory(User::class)->create(
       ['email' => 'hello@test.com',
       'mobile' => '041234567',
       'street' => 'test st',
       'city' => 'test city',
       'password' => bcrypt('testpassword'),]);

     return $user;
   }


    public function testValidRegister()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/register')
                    ->type('name', 'Chen')
                    ->type('email', 'hello@chen.com')
                    ->type('mobile', '0410593116')
                    ->type('street', 'Chapel St')
                    ->type('city','NY')
                    ->type('password','Jane0423.!')
                    ->type('password_confirmation','Jane0423.!')
                    ->press('register')
                    ->assertSee('Dashboard')
                    ->assertPathIs('/home');
        });

      }

      public function testInvalidEmailRegister()
      {
          $user = factory(User::class)->create();

          $this->browse(function ($browser) use ($user) {
              $browser->visit('/register')
                      ->type('name', 'Chen')
                      ->type('email', 'hello.com')
                      ->type('mobile', '0410593116')
                      ->type('street', 'Chapel St')
                      ->type('city','NY')
                      ->type('password','Jane0423.!')
                      ->type('password_confirmation','Jane0423.!')
                      ->press('register')
                      ->assertDontSee('Dashboard')
                      ->assertPathIsNot('/home');
          });

        }

        public function testInvalidMobileRegister()
        {
            $user = factory(User::class)->create();

            $this->browse(function ($browser) use ($user) {
                $browser->visit('/register')
                        ->type('name', 'Chen')
                        ->type('email', 'hello@chen.com')
                        ->type('mobile', '0410593')
                        ->type('street', 'Chapel St')
                        ->type('city','NY')
                        ->type('password','Jane0423.!')
                        ->type('password_confirmation','Jane0423.!')
                        ->press('register')
                        ->assertDontSee('Dashboard')
                        ->assertSee('The mobile format is invalid.')
                        ->assertPathIsNot('/home');
            });
          }

          public function testInvalidPasswordRegister()
          {
              $user = factory(User::class)->create();

              $this->browse(function ($browser) use ($user) {
                  $browser->visit('/register')
                          ->type('name', 'Chen')
                          ->type('email', 'hello@chen.com')
                          ->type('mobile', '0410593116')
                          ->type('street', 'Chapel St')
                          ->type('city','NY')
                          ->type('password','123')
                          ->type('password_confirmation','123')
                          ->press('register')
                          ->assertDontSee('Dashboard')
                          ->assertPathIsNot('/home');
              });
            }

            public function testInvalidPasswordNotMatchTwoTimesRegister()
            {
                $user = factory(User::class)->create();

                $this->browse(function ($browser) use ($user) {
                    $browser->visit('/register')
                            ->type('name', 'Chen')
                            ->type('email', 'hello@chen.com')
                            ->type('mobile', '0410593116')
                            ->type('street', 'Chapel St')
                            ->type('city','NY')
                            ->type('password','Jane0423.!')
                            ->type('password_confirmation','123')
                            ->press('register')
                            ->assertDontSee('Dashboard')
                            ->assertSee('The password confirmation does not match')
                            ->assertPathIsNot('/home');
                });
              }

              public function testVisitRegister()
              {
                $this->browse(function ($browser){
                    $browser->visit('/register')
                            ->assertSee('Register');
                });
              }

              public function testExistedUserRegister()
              {
                  $user = $this->createUser();



                  $this->browse(function ($browser) use ($user) {
                      $browser->visit('/register')
                              ->type('name', 'Chen')
                              ->type('email', 'hello@test.com')
                              ->type('mobile', '0410593116')
                              ->type('street', 'Chapel St')
                              ->type('city','NY')
                              ->type('password','Jane0423.!')
                              ->type('password_confirmation','Jane0423.!')
                              ->press('register')
                              ->assertDontSee('Dashboard')
                              ->assertSee('The email has already been taken.')
                              ->assertPathIsNot('/home');
                  });

                }

}
