<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Checklist::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(4),
        'series_fk' => \App\Models\Series::all()->random()->group_id,
        'is_active' => $faker->numberBetween(0, 1)
    ];
});
