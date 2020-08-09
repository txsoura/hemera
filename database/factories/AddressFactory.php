<?php

/*
  |--------------------------------------------------------------------------
  | Address Factories
  |--------------------------------------------------------------------------
  |
  | Here you may define all of your model factories. Model factories give
  | you a convenient way to create models for testing and seeding your
  | database. Just tell the factory how a default model should look.
  |
 */

$factory->define(Domain\Address\Address::class, function (Faker\Generator $faker) {

    return [
        'latitude'      => $faker->name,
        'longitude'      => $faker->name,
        'number'      => $faker->randomDigit,
        'city'      => $faker->name,
        'state'      => $faker->name,
    ];
});
