<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Categories;
use Faker\Generator as Faker;

$factory->define(Categories::class, function (Faker $faker) {
    return [
        'title' => $faker->name
    ];
});
