<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agenda;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Agenda::class, function (Faker $faker) {
    return [
        'notas' => $faker->name,
    ];
});
