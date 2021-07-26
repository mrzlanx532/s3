<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\NewsCategories;
use Faker\Generator as Faker;

$factory->define(NewsCategories::class, function (Faker $faker) {
    return [
        'title' => $faker->name
    ];
});
