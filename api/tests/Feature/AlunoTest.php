<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Aluno;

class AlunoTest extends TestCase
{
    const FIELDS = ['id'. 'cpf', 'rg', 'data_nascimento', 'nome', 'telefone'];

    public function testDeveCriarUmAlunoNoDbERetornarJsonDoRegistroGravado()
    {
        $aluno = [
            'cpf' => $this->faker->randomNumber(),
            'rg' => $this->faker->randomNumber(),
            'data_nascimento' => $this->faker->date(
                    $format = 'Y-m-d', $max = 'now'),
            'nome' => $this->faker->name,
            'telefone' => $this->faker->randomNumber(),
        ];

        $this->post(route('alunos.create'), $aluno)
            ->assertStatus(201)
            ->assertJson($aluno);
    }

    public function testDeveRetornarUmJsonComTodosOsAlunos()
    {
        $alunos = factory(Aluno::class, 5)
                    ->create()
                    ->map(function ($aluno) {
                        return $aluno->only(['id', 'cpf', 'rg', 'data_nascimento', 'nome', 'telefone']);
                    });

        $this->get(route('alunos'))
            ->assertStatus(200)
            ->assertJson($alunos->toArray())
            ->assertJsonStructure([
                '*' => ['id', 'cpf', 'rg', 'data_nascimento', 'nome', 'telefone'],
            ]);
    }

    public function testeDeveRetornarUmAlunoPorId()
    {
        $aluno = [
            'cpf' => $this->faker->randomNumber(),
            'rg' => $this->faker->randomNumber(),
            'data_nascimento' => $this->faker->date(
                    $format = 'Y-m-d', $max = 'now'),
            'nome' => $this->faker->name,
            'telefone' => $this->faker->randomNumber(),
        ];

        $response = $this->post(route('alunos.create'), $aluno);

        $json = $response->assertStatus(201)
                         ->json($aluno)
                         ->map(function ($data) {
                             return $data->only(['id', 'cpf', 'rg', 'data_nascimento', 'nome', 'telefone']);
                         });
        var_dump($json);
        // $this->get('/api/alunos/' . $response::data['id']);
    }
}
