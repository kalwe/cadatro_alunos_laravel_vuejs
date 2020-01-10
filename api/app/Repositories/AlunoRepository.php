<?php

namespace App\Repositories;

use App\Models\Aluno;

class AlunoRepository implements IAlunoRepository{

    public function save($aluno)
    {
        return Aluno::create($aluno);
    }

    public function listAll()
    {
        return Aluno::all();
    }

    public function findById($id)
    {
        return Aluno::findOrFail($id);
    }

    public function update($id, $aluno)
    {
        $result = Aluno::where('id', $id)->firstOrFail();
        return $result->update($aluno);
    }

    public function delete($id)
    {
        $result = Aluno::where('id', $id)->firstOrFail();
        $result->delete();
    }
}
