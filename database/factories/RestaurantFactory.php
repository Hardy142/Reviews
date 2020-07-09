<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => 'Jack Astors',
        'featured_image' => '/images/uploads/restaurants/Jack-Astor.jpg',
        'country' => 'Canada',
        'province_state' => 'Ontario',
        'city' => 'London',
    ];
});
