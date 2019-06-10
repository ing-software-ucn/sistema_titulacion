<?php

use Faker\Generator as Faker;

$factory->define(App\estudiante::class, function (Faker $faker) {

    $num = strval(rand(18000000,20500000));
    $veri = strval(rand(1,9));
    $run = $num."-".$veri;
    return [
    


    ];
});
