<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'status' => $faker->randomElement($array = array('New', 'In-Progress', 'Canceled', 'Completed'))
    ];
});