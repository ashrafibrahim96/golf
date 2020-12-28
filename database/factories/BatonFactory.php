<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Contenu_Sac\Baton;
use Faker\Generator as Faker;

$factory->define(Baton::class, function (Faker $faker) {
    return [
        'nom'=>'hybride' ,
    ];
});
