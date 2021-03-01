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
            'name' => 'Abc',
            'slug' => Str::slug('Abc', '-'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
