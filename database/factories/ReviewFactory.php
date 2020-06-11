<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'product_id' => Product::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'body' => $faker->realText(50)
    ];
});
