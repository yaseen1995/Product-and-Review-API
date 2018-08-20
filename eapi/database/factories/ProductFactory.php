<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) { // This class faker factory imprints dummy data in to the databases tables
    return [
        'name' => $faker->name,
        'detail' => $faker->text('200'),
        'price' => $faker->numberBetween(100,1000),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(2,30)
    ];
});
