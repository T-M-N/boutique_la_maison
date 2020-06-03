<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 4),
        'description' => $faker->paragraph(), 
        "price" => $faker->randomFloat(2, 0, 100),
        "size" => $faker->randomElement(['46', '48', '50', '52']), 
        "url_image"=>$faker->imageUrl($width = 640, $height = 480),
        'status' => $faker->randomElement(['published', 'unpublished']),
        'code' => $faker->randomElement(['solde', 'new']),
        'reference' => $faker->ean8(),
    ];
});
