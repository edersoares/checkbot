<?php

use Faker\Generator as Faker;

$factory->define(App\Url::class, function (Faker $faker) {
    return [
        'host' => $faker->url,
        'port' => 80,
        'status' => 1,
        'available_at' => $faker->dateTimeThisMonth,
    ];
});
