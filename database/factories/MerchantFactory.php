<?php

/*
  |--------------------------------------------------------------------------
  | Merchant Factories
  |--------------------------------------------------------------------------
  |
  | Here you may define all of your model factories. Model factories give
  | you a convenient way to create models for testing and seeding your
  | database. Just tell the factory how a default model should look.
  |
 */

$factory->define(Domain\Merchant\Merchant::class, function (Faker\Generator $faker) {

    return [
        'cpf_cnpj'      => $faker->randomDigit,
        'cellphone'      => $faker->randomDigit,
        'name'      => $faker->name,
        'img'      => $faker->name,
    ];
});
