<?php

namespace App\Repositories;

use App\Models\Curso;

class CursoRepository {

    public function save($curso)
    {
        return Curso::create($curso);
    }

    public function listAll()
    {
        return Curso::all();
    }

    public function findById($id)
    {
        return Curso::findOrFail($id);
    }

    public function update($id, $curso)
    {
        $result = Curso::where('id', $id)->firstOrFail();
        return $result->update($curso);
    }

    public function delete($id)
    {
        $result = Curso::where('id', $id)->firstOrFail();
        $result->delete();
    }
}
