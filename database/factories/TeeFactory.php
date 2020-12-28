<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Contenu_Sac\Tee;
use Faker\Generator as Faker;

$factory->define(Tee::class, function (Faker $faker) {
    return [
        'marque'=>'balle'
    ];
});
