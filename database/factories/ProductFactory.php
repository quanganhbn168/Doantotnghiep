<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
	$project_id = App\Models\Project::pluck('id')->toArray();
	$unit_id = App\Models\Unit::pluck('id')->toArray();
    return [
        'name'	=> $faker->name,
        'unit_id'=>$faker->randomElement($unit_id),
        'quantity'=>$faker->numberBetween($min = 1, $max = 100),
        'description'=>$faker->text(20),
        'project_id'=>$faker->randomElement($project_id)
    ];
});
