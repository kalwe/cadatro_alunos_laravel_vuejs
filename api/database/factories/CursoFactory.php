<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Curso::class, function (Faker $faker) {
    return [
        'nome' => $faker->sentence,
        'valor_mensalidade' => $faker->sentence,
        'valor_matricula' => $faker->sentence,
        'periodo' => $faker->sentence,
        'meses_duracao' => $faker->sentence,
    ];
});
