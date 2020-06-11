<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rating;
use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(rating::class, function (Faker $faker) {
    return [
        'product_id' => Product::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'rating' => $faker->numberBetween(1, 5)
    ];
});
