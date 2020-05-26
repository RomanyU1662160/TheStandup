<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
                'fname' => 'Romany',
                'lname' => 'Sefen',
                'email' => 'romany@standup.com',
                'password' => Hash::make('rrrrrr'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fname' => 'Admin',
                'lname' => '1',
                'email' => 'admin@standup.com',
                'password' => Hash::make('aaaaaa'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fname' => 'Tester',
                'lname' => '1',
                'email' => 'tester@standup.com',
                'password' => Hash::make('tttttt'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fname' => 'Devloper',
                'lname' => '1',
                'email' => 'dev1@standup.com',
                'password' => Hash::make('dddddd'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fname' => 'Devloper',
                'lname' => '2',
                'email' => 'dev2@standup.com',
                'password' => Hash::make('dddddd'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}