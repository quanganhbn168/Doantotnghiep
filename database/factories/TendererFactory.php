<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tenderer;
use Faker\Generator as Faker;

$factory->define(Tenderer::class, function (Faker $faker) {
    return [
        'name'		=> $faker->company,
        'email'		=> $faker->unique()->companyEmail,
        'email_verified_at' => now(),
        'password'	=> bcrypt($faker->password),
        'images'	=> $faker->imageUrl($width=640, $height=480, 'cats'),
        'address'	=> $faker->address,
        'phone'		=> $faker->unique()->phoneNumber,
        'website'	=> $faker->url,
        'status'	=> $faker->boolean,
        'is_tenderer'=>$faker->boolean
    ];
});
