<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Curso::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'valor_mensalidade' => $faker->randomNumber(8),
        'valor_matricula' => $faker->randomNumber(8),
        'periodo' => $faker->numberBetween(1, 3),
        'meses_duracao' => $faker->randomNumber(),
    ];
});
