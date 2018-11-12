<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(50),
    ];
});

$factory->define(App\Question::class, function (Faker $faker) {
    $item_ids = DB::table('items')->pluck('id')->all();

    return [
        'name' => $faker->realText(50),
        'question' => $faker->realText(500),
        'item_id' => $faker->randomElement($item_ids),
    ];
});

$factory->define(App\Answer::class, function (Faker $faker) {
    $question_ids = DB::table('questions')->pluck('id')->all();

    return [
        'answer' => $faker->realText(500),
        'question_id' => $faker->randomElement($question_ids),
    ];
});
