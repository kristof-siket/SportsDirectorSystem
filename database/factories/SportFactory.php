<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.07.
 * Time: 16:17
 */

$factory->define(App\Sport::class, function (Faker\Generator $faker) {
    return [
        'sport_name' => $faker->colorName,
        'sport_desc' => $faker->sentence,
        'multisport' => "nem",
    ];
});