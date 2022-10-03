<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WashingStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('washing_steps')->insert([
            ['id' => 1, 'name' => 'Seats Washing'],
            ['id' => 2, 'name' => 'Vacuum Cleaning'],
            ['id' => 3, 'name' => 'Interior Wet Cleaning'],
            ['id' => 4, 'name' => 'Window Wiping'],
            ['id' => 5, 'name' => 'Pressure Washing'],
            ['id' => 6, 'name' => 'Rinsing'],
            ['id' => 7, 'name' => 'Polymer Maintenance'],
            ['id' => 8, 'name' => 'Polyshing and drying']
        ]);
    }
}
