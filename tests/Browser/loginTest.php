<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class loginTest extends DuskTestCase
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


   public function testLogin(){
     $user = $this->createUser();
     $this->browse(function ($browser){
         $browser->visit('/login')
                 ->type('email','hello@test.com')
                 ->type('password','testpassword')
                 ->press('login')
                 ->assertPathIs('/home')
                 ->assertSee('Dashboard');
     });
   }

   public function testVisitLogin()
   {
     $this->browse(function ($browser){
         $browser->visit('/login')
                 ->assertSee('Login');
     });
   }

   public function testInvalidUserLogin(){

     $this->browse(function ($browser) {
         $browser->visit('/login')
                 ->type('email','jan@qq.com')
                 ->type('password','testpassword')
                 ->press('login')
                 ->assertSee('These credentials do not match our records.');
     });
   }

}
