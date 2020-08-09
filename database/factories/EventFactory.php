<?php

/*
  |--------------------------------------------------------------------------
  | Event Factories
  |--------------------------------------------------------------------------
  |
  | Here you may define all of your model factories. Model factories give
  | you a convenient way to create models for testing and seeding your
  | database. Just tell the factory how a default model should look.
  |
 */

use Domain\Address\Address;
use Domain\Category\Category;
use Domain\Merchant\Merchant;

$factory->define(Domain\Event\Event::class, function (Faker\Generator $faker) {

    return [
        'name'      => $faker->name,
        'description'      => $faker->name,
        'start'      => $faker->dateTime,
        'end'      => $faker->dateTime,
        'type'      => $faker->randomElement(collect(["free", "paid"])),
        'price'      => $faker->randomFloat(2, 200, 8000),
        'category_id'      => function () {
            return factory(Category::class)->create()->id;
        },
        'img'      => $faker->name,
        'address_id'      => function () {
            return factory(Address::class)->create()->id;
        },
        'merchant_id'      => function () {
            return factory(Merchant::class)->create()->id;
        },
    ];
});
