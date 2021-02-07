<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Shubham Lal',
            'role_id' => 2,
            'email' => 'shubhamlal@gmail.com',
            'city' => 'Mumbai',
            'country' => 'India',
            'dob' => now(),
            'phone' => '9004728301',
            'password' => bcrypt('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}


