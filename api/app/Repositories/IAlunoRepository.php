<?php

namespace App\Repositories;

# TODO: fazer uma interface base e usar repositorio central CRUD
interface IAlunoRepository
{
    public function save();

    public function listAll();

    public function findById();

    public function update();

    public function delete();
}
