<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => 'Project ' . $faker->text(20),
        'start_date' => Carbon::now()->addDays($faker->numberBetween($min = 7, $max = 60)),
        'end_date' => Carbon::now()->addMonth($faker->numberBetween($min = 2, $max = 6)),
        'about' => $faker->text,
    ];
});
