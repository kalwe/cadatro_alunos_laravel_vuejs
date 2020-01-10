<?php

namespace App\Repositories;

use App\Models\Curso;

# TODO: fazer uma interface base e usar repositorio central CRUD
interface ICursoRepository
{
    public function save($curso);

    public function listAll();

    public function findById($id);

    public function update($id, $req);

    public function delete($id);
}
