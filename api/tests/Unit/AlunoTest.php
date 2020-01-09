<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Aluno;

class AlunoTeste extends TestCase
{
    public function test_can_create_aluno() {
        $data = [
            'cpf' => $this->faker->sentence,
            'rg' => $this->faker->sentence,
            'data_nascimento' => $this->faker->sentence,
            'nome' => $this->faker->sentence,
            'telefone' => $this->faker->sentence,
        ];

        $this->aluno(route('alunos.create'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_can_update_aluno() {
        $aluno = factory(Aluno::class)->create();
        $data = [
            'cpf' => $this->faker->sentence,
            'rg' => $this->faker->sentence,
            'data_nascimento' => $this->faker->sentence,
            'nome' => $this->faker->sentence,
            'telefone' => $this->faker->sentence,
        ];
        $this->put(route('alunos.update', $aluno->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function test_can_delete_aluno() {
        $aluno = factory(Aluno::class)->create();
        $this->delete(route('alunos.delete', $aluno->id))
            ->assertStatus(204);
    }

    public function test_can_list_alunos() {
        $alunos = factory(Aluno::class, 2)->create()->map(function ($aluno) {
            return $aluno->only(['id', 'cpf', 'rg', 'data_nascimento', 'nome', 'telefone']);
        });
        $this->get(route('alunos'))
            ->assertStatus(200)
            ->assertJson($alunos->toArray())
            ->assertJsonStructure([
                '*' => ['id', 'cpf', 'rg', 'data_nascimento', 'nome', 'telefone'],
            ]);
    }
}
