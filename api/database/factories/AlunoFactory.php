<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Aluno::class, function (Faker $faker) {
    return [
        'cpf' => $faker->sentence,
        'rg' => $faker->sentence,
        'data_nascimento' => $faker->sentence,
        'nome' => $faker->sentence,
        'telefone' => $faker->sentence,
    ];
});
