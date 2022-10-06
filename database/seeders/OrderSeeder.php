<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'number' => mt_rand(100000,999999),
                'price' => 212.33,
                'user_id' => 3,
                'program_id' => 1,
                'order_phase_id' => 1,
                'car_id' => 1
            ],
            [
                'number' => mt_rand(100000,999999),
                'price' => 512.33,
                'user_id' => 3,
                'program_id' => 2,
                'order_phase_id' => 3,
                'car_id' => 1
            ],
            [
                'number' => mt_rand(100000,999999),
                'price' => 112.33,
                'user_id' => 3,
                'program_id' => 1,
                'order_phase_id' => 2,
                'car_id' => 1
            ]
        ]);
    }
}
