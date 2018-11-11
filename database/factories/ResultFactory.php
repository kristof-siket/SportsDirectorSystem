<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.07.
 * Time: 17:31
 */

use Faker\Generator as Faker;

$factory->define(App\Result::class, function (Faker $faker) {
    return [
        'result_athlete' => factory(\App\User::class),
        'result_sport' => factory(\App\Sport::class),
        'result_competition' => factory(\App\Competition::class),
        'result_distance' => factory(\App\Distance::class),
        'disqualified' => 0,
        'result_time' => $faker->numberBetween(100, 200),
        'result_multisport' => factory(\App\Sport::class)
    ];
});