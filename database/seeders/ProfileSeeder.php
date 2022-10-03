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
                'first_name' => 'korisnik1',
                'last_name' => 'prezime2',
                'address' => 'address1',
                'phone' => '+387615432145',
                'user_id' => 1
            ],
            [
                'first_name' => 'korisnik2',
                'last_name' => 'prezime4',
                'address' => 'address23',
                'phone' => '+387615434345',
                'user_id' => 2
            ],
            [
                'first_name' => 'korisnik2321',
                'last_name' => 'prezime43',
                'address' => 'address21233',
                'phone' => '+387615421345',
                'user_id' => 3
            ],
        ]);
    }
}
