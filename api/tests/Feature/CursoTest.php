<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CursoTest extends TestCase
{
    const URL = '/api/cursos';

    public function testExample()
    {
        $response = $this->get(CursoTest::URL);

        $response->assertStatus(200);
    }
}
