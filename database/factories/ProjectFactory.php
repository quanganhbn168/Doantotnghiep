<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
	$tenderer_id = App\Models\Tenderer::pluck('id')->toArray();
	$category_id = App\Models\Category::pluck('id')->toArray();
    return [
        'name'	=> $faker->text(20),
        'timeStart'=>$faker->date($format = 'd-m-Y',$startDate = '-1 years', $endDate = 'now',$timezone = 'Asian/Ho_Chi_minh'),
        'timeEnd'=>$faker->date($format = 'd-m-Y',$startDate = '-1 years', $endDate = 'now',$timezone = 'Asian/Ho_Chi_minh'),
        'publish'=>$faker->boolean,
        'category_id'	=> $faker->randomElement($category_id),
        'tenderer_id'	=> $faker->randomElement($tenderer_id)
    ];
});
