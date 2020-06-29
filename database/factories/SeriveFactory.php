<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
	$category_id = App\Models\Category::pluck('id')->toArray();
    return [
        'name'=>$faker->name,
        'category_id'	=> $faker->randomElement($category_id),
    ];
});
