<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\User;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $user = User::find(User::all()->random()->id);
    $date_created = $faker->dateTimeBetween('-2 years', 'now');
    return [
        'user_id' => $user->id,
        'status' => 'isPaid',
        'amount' => 0,
        'tax_amount' => 0,
        'delivery_street' => $user->street,
        'delivery_number' => $user->number,
        'delivery_postcode' => $user->postcode,
        'delivery_city' => $user->city,
        'delivery_country' => $user->country,
        'payment_method' => 'ideal',
        'created_at' => $date_created,
        'updated_at' => $date_created
    ];
});
