<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->mimeType,
        'user_id' => random_int(1,2),
        'description' => $faker->realText(80,  2)
    ];
});
