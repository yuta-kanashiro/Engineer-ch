<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\User;
use App\Models\Bulletin;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

    // Userモデル、Bulletinモデルからそれぞれ一件取得してidを抽出
    $user_id = User::inRandomOrder()->first()->id;
    $bulletin_id = Bulletin::inRandomOrder()->first()->id;

    return [
        'user_id' => $user_id,
        'bulletin_id' => $bulletin_id,
        'comment' => $faker->realText(10),
        'created_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
        'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get())
    ];
});
