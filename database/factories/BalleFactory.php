<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Contenu_Sac\Balle;
use Faker\Generator as Faker;

$factory->define(Balle::class, function (Faker $faker) {
    return [
        'marque'=>'balle'
    ];
});
