<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'first_name' => $faker->word,
        'last_name' => $faker->word,
        'address_id' => $faker->randomDigitNotNull,
        'delivery_costs' => $faker->word,
        'min_order_amount' => $faker->word,
        'email' => $faker->word,
        'telephone' => $faker->word,
        'iban' => $faker->word,
        'kvk' => $faker->word,
        'vat_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
