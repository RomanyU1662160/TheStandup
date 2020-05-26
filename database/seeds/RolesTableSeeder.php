<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                [
                    'name' => 'Admin',
                ],
                [
                    'name' => 'Developer',
                ],
                [
                    'name' => 'Product Owner',
                ],
                [
                    'name' => 'Scrum Master',
                ],
                [
                    'name' => 'Tester',
                ],
                [
                    'name' => 'Tech Lead',
                ],
                [
                    'name' => 'UX Designer',
                ],
                [
                    'name' => 'Other',
                ],

            ]
        );
    }
}