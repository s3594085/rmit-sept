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
        DB::table('users')->insert([
            'name' => 'Seeder',
            'email' => 'seed@test.com',
            'password' => bcrypt('seed'),
            'mobile' => '0123456789',
            'street' => 'seed st',
            'city' => 'seed city',
        ]);
    }
}
