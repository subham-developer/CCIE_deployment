<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        // $this->call(RolsTableSeeder::class);
        // $this->call(CcieTableSeeder::class);
        // $this->call(RackTableSeeder::class);
        $this->call(EventsTableSeeder::class);
    }
}
