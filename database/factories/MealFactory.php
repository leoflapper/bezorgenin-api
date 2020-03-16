<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Meal;
use Faker\Generator as Faker;

$factory->define(Meal::class, function (Faker $faker) {

    return [
        'meal_category_id' => $faker->randomDigitNotNull,
        'company_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'description' => $faker->text,
        'allergens' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
