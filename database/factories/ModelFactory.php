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
        'country' => 'Poland',
        'city' => 'Kraków',
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
        'club_id' => 1,
        'user_id' => 2,
    ];
});

$factory->define(App\FootballPosition::class, function (Faker\Generator $faker) {

    return [
        'name' => 'Undefined'
    ];
});

$factory->define(App\Tournament::class, function (Faker\Generator $faker) {

    $startDate = date('Y-m-d');
    $endDate = date_create(date('Y-m-d', strtotime($startDate. ' +7days')));

    return [
        'name' => 'President Masters Tournament',
        'start_date' => $startDate,
        'end_date' => $endDate,
        'country' => 'Poland',
        'city' => 'Kraków',
        'tournament_points' => 750,
        'number_of_seats' => '16',
        'number_of_available_seats' => 16,
        'game_system' => 'single elimination',
        'user_id' => 4
    ];
});
