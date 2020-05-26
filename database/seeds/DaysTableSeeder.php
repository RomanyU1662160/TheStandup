<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([

            [
                'id' => 1,
                'name' => 'mon',
            ],
            [
                'id' => 2,
                'name' => 'tue',
            ],
            [
                'id' => 3,
                'name' => 'wed',
            ],

            [
                'id' => 4,
                'name' => 'thu',
            ],

            [
                'id' => 5,
                'name' => 'fri',
            ],

            [
                'id' => 6,
                'name' => 'sat',
            ],

        ]);
    }
}
