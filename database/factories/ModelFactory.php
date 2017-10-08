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

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use App\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->name,
        'password' => $password ?: $password = bcrypt('secret'),
        'role_id' => Role::Footballer,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Club::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'founded_by' => $faker->unique()->name,
        'country' => 'Poland',
        'city' => 'Kraków'
    ];
});

$factory->define(App\Contract::class, function (Faker\Generator $faker) {

    return [
        'duration' => '1 week',
        'status' => 'created',
        'club_name' => $faker->name,
        'user_name' => $faker->name,
        'club_id' => 1,
        'user_id' => 2,
    ];
});
