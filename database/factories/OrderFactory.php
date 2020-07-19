<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
	$tenderer_id = App\Models\Tenderer::pluck('id')->toArray();
	$contractor_id = App\Models\Contractor::pluck('id')->toArray();
	$project_id = App\Models\Project::pluck('id')->toArray();
    return [
    	'tenderer_id'	=>$faker->randomElement($tenderer_id),
    	'contractor_id'	=>$faker->randomElement($contractor_id),
    	'project_id'	=>$faker->randomElement($project_id),
        'price'			=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'service'		=>$faker->text($maxNbChars = 200),
        'status'		=>$faker->boolean
    ];
});
