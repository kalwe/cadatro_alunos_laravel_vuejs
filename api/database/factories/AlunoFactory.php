<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Aluno::class, function (Faker $faker) {
    return [
        'cpf' => $faker->randomNumber(),
        'rg' => $faker->randomNumber(),
        'data_nascimento' => $faker->date('Y-m-d', 'now'),
        'nome' => $faker->name,
        'telefone' => $faker->randomNumber(),
    ];
});
