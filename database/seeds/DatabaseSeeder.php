<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        /*
        factory(App\User::class, 2)->create()->each(function($u) {
          $u->issues()->save(factory(App\Issues::class)->make());
        });
        */

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin'),
            'mobile' => '0123456789',
            'street' => 'seed st',
            'city' => 'seed city',
            'admin' => 1,
        ]);
    }
}
