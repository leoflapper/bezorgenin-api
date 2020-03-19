<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderProduct;
use Faker\Generator as Faker;

$factory->define(OrderProduct::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'allergens' => $faker->text,
        'quantity' => $faker->randomDigitNotNull,
        'price' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
