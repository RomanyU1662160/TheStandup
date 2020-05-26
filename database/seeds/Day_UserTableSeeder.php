<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Day_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('day_user')->insert([
            ['user_id' => 1,
                'day_id' => 1,
            ],
            ['user_id' => 1,
                'day_id' => 2,
            ],
            ['user_id' => 2,
                'day_id' => 1,
            ],
            ['user_id' => 3,
                'day_id' => 3,
            ],
            ['user_id' => 4,
                'day_id' => 1,
            ],
            ['user_id' => 1,
                'day_id' => 3,
            ],
            ['user_id' => 3,
                'day_id' => 1,
            ],
            ['user_id' => 5,
                'day_id' => 3,
            ],
        ]);
    }
}
