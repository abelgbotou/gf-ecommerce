<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'slug'=>$faker->slug,
        'description'=>$faker->text,
        'image'=>$faker->imageUrl,
        'price'=>random_int(1000,10000),
        'rating'=>random_int(1,10),
        
    ];
});
