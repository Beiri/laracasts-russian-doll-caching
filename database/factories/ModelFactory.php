<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Card::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
    ];
});

$factory->define(App\Note::class, function (Faker\Generator $faker) {
    return [
        'card_id' => factory('App\Card')->create()->id,
        'user_id' => factory('App\User')->create()->id,
        'body' => $faker->paragraph,
    ];
});
