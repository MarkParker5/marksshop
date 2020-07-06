<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
	$users = \App\User::all()->pluck('id')->toArray();
	$products = \App\Product::all()->pluck('id')->toArray();
	return [
		'review'		=> $faker->text(250),
		'user_id'		=> $faker->randomElement($users),
		'product_id'	=> $faker->randomElement($products),
		'created_at'	=> $faker->dateTime(),
		'updated_at'	=> $faker->dateTime(),
	];
});
