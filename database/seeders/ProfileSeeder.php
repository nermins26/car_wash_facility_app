<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            [
                'first_name' => 'First',
                'last_name' => 'Client',
                'address' => 'address 123',
                'phone' => '+387615421345',
                'user_id' => 3  //profile for client
            ],
        ]);
    }
}
