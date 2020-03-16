<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {

    return [
        'street' => $faker->word,
        'housenumber' => $faker->randomDigitNotNull,
        'housenumber_addition' => $faker->word,
        'postcode' => $faker->word,
        'city' => $faker->word,
        'country_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
