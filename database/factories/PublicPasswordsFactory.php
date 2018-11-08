<?php

use Faker\Generator as Faker;

$factory->define(App\Passwords::class, function (Faker $faker) {
    $pass = encrypt('test');
    return [
        "name" => $faker->name,
        'password' => $pass,
    ];
});
