<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'description'=>$faker->text($maxNbChars = 200),
        'content'=>$faker->paragraph
    ];
});
