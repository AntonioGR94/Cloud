<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\File;
use Faker\Generator as Faker;

$factory->define(File::class, function (Faker $faker) {
    $name = ucfirst($faker->mimeType);
    return [
        'name' => $name,
        'slug' => str_slug($name, "-"),
        'user_id' => random_int(1,2),
        'description' => $faker->realText(80,  2),
        'archivo' => $name
    ];
});
