<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contractor;
use Faker\Generator as Faker;

$factory->define(Contractor::class, function (Faker $faker) {
    return [
        'name'		=> $faker->company,
        'email'		=> $faker->unique()->companyEmail,
        'password'	=> bcrypt($faker->password),
        'images'	=> $faker->imageUrl($width=640, $height=480, 'cats'),
        'address'	=> $faker->address,
        'phone'		=> $faker->unique()->phoneNumber,
        'website'	=> $faker->url,
        'status'	=> $faker->boolean,
        'is_contractor'=>$faker->boolean,
        'approved_at'   =>randomElement([now(),null])
    ];
});
