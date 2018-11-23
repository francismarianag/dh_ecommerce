<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(0, 2),
        // 'image' => ,
        'status' => 1,
        'user_id' => 1,
        // 'category_id' => $faker->numberBetween(0,5)
    ];
});
