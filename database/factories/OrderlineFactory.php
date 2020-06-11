<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderLine;
use App\Order;
use App\User;
use App\Product;
use Faker\Generator as Faker;

$factory->define(OrderLine::class, function (Faker $faker) {
    $product = Product::all()->random();
    return [
        'order_id' => Order::all()->random()->id,
        'product_id' => $product->id,
        'user_id' => User::all()->random()->id,
        'quantity' => rand(1,10),
        'price' => $product->price,
        'tax_amount' => 0,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
