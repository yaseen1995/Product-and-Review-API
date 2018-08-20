<?php

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [

        'product_id' => function() {
          return Product::all()->random();
        },

        'customer' => $faker->word,
        'review' => $faker->text('200'),
        'star' => $faker->numberBetween(0,5)
    ];
});
