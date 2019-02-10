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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'info' => $faker->sentence,
        'number' => $faker->sentence, // secret
    ];
});

$factory->define(\App\Activity::class, function (Faker $faker){
    return [
        'contact_id' => \App\Contact::inRandomOrder()->first()->id,
        'cell_number' => $faker->e164PhoneNumber,
        'status' => $faker->sentence(5),
        'ranking' => $faker->numberBetween($min = 1, $max = 5)
    ];
});


$factory->define(\App\Post::class, function (Faker $faker){
    return [
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'name' => $faker->name,
        'description' => $faker->sentence(10)
    ];
});
