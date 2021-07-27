<?php

/** @var Factory $factory */

use App\Models\Categories;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Categories::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'state' => Categories::STATE_PUBLISHED
    ];
});
