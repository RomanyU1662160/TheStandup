<?php

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert(
            [
                [
                    'name' => 'Team 1 ',
                    'about' => "About Team 1 !!",
                ],
                [
                    'name' => 'Team 2 ',
                    'about' => "About Team 2 !!",
                ],
            ]
        );
        factory(Team::class, 3)->create();
    }
}