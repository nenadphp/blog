<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {

     return [
         'user_id' => \App\User::all()->random()->id,
         'post_id' => \App\Post::all()->random()->id,
         'title' => $faker->text(10),
         'content' => $faker->text,
         'created_at' => now(),
         'updated_at' => now()
     ];

});
