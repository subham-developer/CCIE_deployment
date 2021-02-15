<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('events')->insert([
            // 'title' => 'Rack 1',
            'user_id' => 2,
            'ccie_id' => 2,
            'rack_id' => 1,
            'timezone' => 'Europe/Kiev',
            'start_date' => '2021-01-31 07:00:00',
            'end_date' => Carbon::parse('2021-01-31 07:00:00')->addHour(4),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
