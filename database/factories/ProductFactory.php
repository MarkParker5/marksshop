<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->words(3, true);
    $categories = \App\Category::all()->pluck('id')->toArray();
   
    return [
        'name'			=> $name,
        'slug'			=> Str::slug($name),
        'img'			=> 'https://loremflickr.com/320/340',
        'price'			=> $faker->randomFloat(2, 0, 1000),
        'description'	=> $faker->text(1000),
        'recomended'    => $faker->boolean(25),
        'category_id'	=> $faker->shuffle($categories)[0],
    ];
});