<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'category_id' => function() {
            return factory(App\Model\Categories::class)->create()->id;
        },
        'header' => $faker->sentence(4),
        'publish_date' => $faker->date(),
        'preview_img' => $faker->imageUrl(),
        'preview_text' => $faker->text(),
        'views_count' => $faker->numberBetween(0, 30)
    ];
});
