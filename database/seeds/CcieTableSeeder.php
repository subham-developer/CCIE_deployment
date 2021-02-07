<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CcieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ccies')->insert([
            'name' => 'Enterprise Wireless',
            'slug' => Str::slug('Enterprise Wireless', '-'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
