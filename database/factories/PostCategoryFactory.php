<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\PostCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'parent_id' => rand(1, 10)
    ];
});
