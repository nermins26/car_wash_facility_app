<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderPhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_phases')->insert([
            ['name' => 'waiting to accept'],
            ['name' => 'order declined'],
            ['name' => 'order accepted'],
            ['name' => 'washing in progress'],
            ['name' => 'detailing'],
            ['name' => 'drying'],
            ['name' => 'finished'],
        ]);
    }
}
