<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Score\Partie;
use Faker\Generator as Faker;

$factory->define(Partie::class, function (Faker $faker) {
    return [
        'date' => $faker->dateTime ,
        'nombre_joueurs' => 3 ,
    ];
});
