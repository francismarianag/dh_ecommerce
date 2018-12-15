<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(100, 1000),
        'image' => imageUrl($width = 700, $height = 400),
        'status' => 1,
        'user_id' => 1,
        // 'category_id' => $faker->numberBetween(0,5)
    ];
});
