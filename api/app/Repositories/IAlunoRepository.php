<?php

namespace App\Repositories;

# TODO: fazer uma interface base e usar repositorio central CRUD
interface IAlunoRepository
{
    public function save($aluno);

    public function listAll();

    public function findById($id);

    public function update($id, $aluno);

    public function delete($id);
}
