<?php

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
        $this->call(

            [
                UsersTableSeeder::class,
                ProjectTableSeeder::class,
                RolesTableSeeder::class,
                DaysTableSeeder::class,
                Users_RolesTableSeeder::class,
                Day_UserTableSeeder::class,
                TeamsTableSeeder::class,

            ]
        );
    }
}