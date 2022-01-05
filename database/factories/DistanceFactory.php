<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.07.
 * Time: 17:24
 */


use Faker\Generator as Faker;

$factory->define(App\Distance::class, function (Faker $faker) {
    return [
        'distance_name' => $faker->company,
        'sport_id' => factory(\App\Sport::class),
        'distance_kilometers' => $faker->numberBetween(1, 100),
        'multi_id' => null
    ];
});