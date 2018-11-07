<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.07.
 * Time: 15:44
 */

use Faker\Generator as Faker;

$factory->define(App\Competition::class, function (Faker $faker) {
    return [
        'comp_name' => $faker->company,
        'comp_sport' => factory(\App\Sport::class),
        'comp_promoter' => factory(\App\User::class),
        'comp_date' => $faker->dateTime,
        'comp_location' => $faker->city
    ];
});