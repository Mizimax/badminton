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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'Fullname' => $faker->name,
        'Email' => $faker->unique()->safeEmail,
        'Password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\EventTable::class, function (Faker\Generator $faker) {

    return [
        'Event_Name' => $faker->company,
        'Event_Start' => $faker->dateTime,
        'Event_End' => $faker->dateTime,
        'Event_Creator_id' => $faker->randomDigit,
        'Event_Description' => $faker->monthName,
        'Event_Cover_Pic' => 'event_pic.jpg',
        'Event_Image' => 'event_image.jpg',
    ];
});

