<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin123',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('test2022.-'), 
                'role_id' => 1 
                // administrator
            ],
            [
                'username' => 'worker123',
                'email' => 'worker@gmail.com',
                'password' => Hash::make('test2022.-'), 
                'role_id' => 2 
                // worker
            ],
            [
                'username' => 'client123',
                'email' => 'client@gmail.com',
                'password' => Hash::make('test2022.-'), 
                'role_id' => 3 
                // client
            ]
        ]);
    }
}
