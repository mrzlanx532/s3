<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'category_id' => function() {
            return factory(App\Models\Categories::class)->create()->id;
        },
        'state' => $faker->numberBetween(0, 1),
        'header' => $faker->sentence(4),
        'publish_date' => $faker->dateTimeBetween('-10 days', 'now'),
        'preview_img' => $faker->imageUrl(100, 100),
        'preview_text' => $faker->text(100),
        'content' => $faker->text(500),
        'views_count' => $faker->numberBetween(0, 30)
    ];
});
