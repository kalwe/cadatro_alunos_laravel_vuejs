<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Curso;

class CursoTeste extends TestCase
{
    public function test_can_create_curso() {
        $data = [
            'nome' => $this->faker->sentence,
            'valor_mensalidade' => $this->faker->sentence,
            'valor_matricula' => $this->faker->sentence,
            'periodo' => $this->faker->sentence,
            'meses_duracao' => $this->faker->sentence,
        ];

        $this->curso(route('cursos.create'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_can_update_curso() {
        $curso = factory(Curso::class)->create();
        $data = [
            'nome' => $this->faker->sentence,
            'valor_mensalidade' => $this->faker->sentence,
            'valor_matricula' => $this->faker->sentence,
            'periodo' => $this->faker->sentence,
            'meses_duracao' => $this->faker->sentence,
        ];
        $this->put(route('cursos.update', $curso->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function test_can_delete_curso() {
        $curso = factory(Curso::class)->create();
        $this->delete(route('cursos.delete', $curso->id))
            ->assertStatus(204);
    }

    public function test_can_list_cursos() {
        $cursos = factory(Curso::class, 2)->create()->map(function ($curso) {
            return $curso->only(['nome', 'valor_mensalidade', 'valor_matricula', 'periodo', 'meses_duracao']);
        });
        $this->get(route('cursos'))
            ->assertStatus(200)
            ->assertJson($cursos->toArray())
            ->assertJsonStructure([
                '*' => ['nome', 'valor_mensalidade', 'valor_matricula', 'periodo', 'meses_duracao'],
            ]);
    }
}
