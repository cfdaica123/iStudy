<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BookingStatus;
use Faker\Generator as Faker;

$factory->define(BookingStatus::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
