<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->unique()->sentence;
    $user_id = rand (1, 25);
    $slug = Str::slug($title, '-') . $user_id;
    // Note: Adds user id to make slug unique for each entry
    return [
        'title' => $title,
        'user_id' => $user_id, 
        'body' => $faker->paragraph,
        'slug' => $slug,
    ];
});
