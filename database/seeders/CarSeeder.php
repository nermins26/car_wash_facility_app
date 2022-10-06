<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            [
                'brend' => "BMW",
                'model' => 'X5',
                'color' => 'blue',
                'year' => 20014,
                'profile_id' => 1
            ],
            [
                'brend' => "Audi",
                'model' => 'A3',
                'color' => 'black',
                'year' => 2007,
                'profile_id' => 1
            ],
            [
                'brend' => "Mercedes",
                'model' => 'C2000',
                'color' => 'gray',
                'year' => 2019,
                'profile_id' => 1
            ],
        ]);
    }
}
