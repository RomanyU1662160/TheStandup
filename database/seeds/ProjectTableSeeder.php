<?php

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
                'name' => 'Project 1',
                'start_date' => Carbon::now()->addDay(2),
                'end_date' => Carbon::now()->addMonth(2),
                'about' => "About Project 1 ",
            ],
        ]);
        factory(Project::class, 5)->create();
    }
}