<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('racks')->insert([
            'name' => 'Rack 3',
            'slug' => Str::slug('Rack 3', '-'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
