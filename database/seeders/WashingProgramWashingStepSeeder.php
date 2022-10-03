<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WashingProgramWashingStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('washing_program_washing_step')->insert([
            [
                'id' => 1,
                'washing_program_id' => 1,
                'washing_step_id' => 1
            ],
            [
                'id' => 2,
                'washing_program_id' => 1,
                'washing_step_id' => 4
            ],
            [
                'id' => 3,
                'washing_program_id' => 1,
                'washing_step_id' => 5
            ],
            [
                'id' => 4,
                'washing_program_id' => 1,
                'washing_step_id' => 8
            ],
            [
                'id' => 5,
                'washing_program_id' => 2,
                'washing_step_id' => 1
            ],
            [
                'id' => 6,
                'washing_program_id' => 2,
                'washing_step_id' => 2
            ],
            [
                'id' => 7,
                'washing_program_id' => 2,
                'washing_step_id' => 4
            ],
            [
                'id' => 8,
                'washing_program_id' => 2,
                'washing_step_id' => 5
            ],
            [
                'id' => 9,
                'washing_program_id' => 2,
                'washing_step_id' => 7
            ],
            [
                'id' => 10,
                'washing_program_id' => 2,
                'washing_step_id' => 8
            ],
            [
                'id' => 11,
                'washing_program_id' => 3,
                'washing_step_id' => 1
            ],
            [
                'id' => 12,
                'washing_program_id' => 3,
                'washing_step_id' => 2
            ],
            [
                'id' => 13,
                'washing_program_id' => 3,
                'washing_step_id' => 3
            ],
            [
                'id' => 14,
                'washing_program_id' => 3,
                'washing_step_id' => 4
            ],
            [
                'id' => 15,
                'washing_program_id' => 3,
                'washing_step_id' => 5
            ],
            [
                'id' => 16,
                'washing_program_id' => 3,
                'washing_step_id' => 6
            ],
            [
                'id' => 17,
                'washing_program_id' => 3,
                'washing_step_id' => 7
            ],
            [
                'id' => 18,
                'washing_program_id' => 3,
                'washing_step_id' => 8
            ],
        ]);
    }
}
