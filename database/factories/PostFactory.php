<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use Illuminate\Support\Str;
use App\Post;

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $category_id =  Category::all()->pluck('id');
    $user_id = User::all()->pluck('id');
    return [
        //
        'title'=> $faker->text($maxNbChars = 200)  ,
        'content'=> $faker->paragraph,
        'slug'=> str::slug($faker->title),
        'category_id' => $faker->randomElement($category_id),
        'featured' =>'featured/defult_img.jpg',
        'created_at' =>now(),
        'user_id' =>$faker->randomElement($user_id)
    ];
});
