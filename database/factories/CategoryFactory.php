<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'short_desc' => $faker->sentence,
        'full_desc' => $faker->paragraph,
        'image' => $faker->imageUrl(512, 512),
        'parent_id' => null
    ];
});