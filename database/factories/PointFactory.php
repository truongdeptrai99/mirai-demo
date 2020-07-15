<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Point;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Point::class, function (Faker $faker) {
    $user = User::pluck('id')->toArray();
    $point = [1, 2, 3, 4, 5];
    $point_language = $faker->randomElement($point);
    $point_awareness = $faker->randomElement($point);
    $point_healthy = $faker->randomElement($point);
    return [
        'user_id' => $faker->randomElement($user),
        'language' =>  $point_language,
        'awareness' => $point_awareness,
        'healthy' =>  $point_healthy,
        'total'=> $point_language + $point_awareness + $point_healthy,
        'time' => $faker->unique()->date('Y-m-d', 'now'),
    ];
});
