<?php

/** @var Factory $factory */


use App\Model\Parcour;
use App\Model\Trou;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;


$factory->define(Trou::class, function (Faker $faker) {
    return [
        'numero' => $faker->randomNumber(),
        'par'=>$faker->randomNumber() ,
        'strokeIndex'=>$faker->randomNumber() ,
        'distance_trou_blanc'=>$faker->randomNumber() ,
        'distance_trou_rouge' => $faker->randomNumber(),
        'distance_trou_jaune'=>$faker->randomNumber() ,
        'distance_trou_bleu'=>$faker->randomNumber() ,
        'GPS'=>$faker->randomNumber() ,
        'image2D'=>$faker->randomNumber() ,
        'parcour_id'=>1,
    ];
});
