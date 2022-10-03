<?php

namespace Database\Seeders;

use App\Models\OrderPhase;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            WashingProgramSeeder::class,
            WashingStepSeeder::class,
            WashingProgramWashingStepSeeder::class,
            CarSeeder::class,
            OrderSeeder::class,
            OrderPhaseSeeder::class,
            PaymentSeeder::class,
            ProfileSeeder::class,
        ]);
    }
}
