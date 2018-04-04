<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(App\Models\StaticPage::class, function (Faker $faker) {
    $title = $faker->unique()->name;
    $slug = Str::slug($title);

    return [
        'name' => $title,
        'slug' => $slug,
        'content' => $faker->paragraph,
    ];
});
