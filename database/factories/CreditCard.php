<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CreditCard;
use App\User;
use Faker\Generator as Faker;

$factory->define(CreditCard::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'customer_id' => function () {
            return factory(App\User::class, 5)->create();
        },
        'number' => $faker->creditCardNumber,
        'expire' => $faker->creditCardExpirationDate,
        'brand' => $faker->word,
    ];
});
