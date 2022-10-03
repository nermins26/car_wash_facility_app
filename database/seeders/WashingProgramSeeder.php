<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WashingProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('washing_programs')->insert([
            [
                'id' => 1,
                'name' => 'Basic cleaning',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'price' => 99.99
                
            ],
            [
                'id' => 2,
                'name' => 'Premium cleaning',
                'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'price' => 199.99
            ],
            [
                'id' => 3,
                'name' => 'Complex cleaning',
                'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'price' => 299.99
            ],
            
        ]);
    }
}
