<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        //adding test data
        'title' => $faker->sentence,
        'author_name' =>$faker->name,
        'genre_id' =>rand(1,5),
        'book_status' =>'avaliable',
    ];
});
