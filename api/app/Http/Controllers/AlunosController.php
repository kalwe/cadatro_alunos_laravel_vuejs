<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AlunoRepository;

class AlunosController extends Controller
{
    private $alunoRepository;

    public function __construct(AlunoRepository $alunoRepository) {
        $this->alunoRepository = $alunoRepository;
    }

    public function create(Request $req)
    {
        $aluno = $this->alunoRepository->save($req->all());
        return response()->json($aluno);
    }

    public function list()
    {
        return response()->json($this->alunoRepository->listAll());
    }

    public function find($id)
    {
        $data = $this->alunoRepository->findById($id);
        return response()->json($data);
    }

    public function update($id, Request $req)
    {
        $result = $this->alunoRepository->update($id, $req->all());
        return response()->json($result);
    }

    public function delete($id)
    {
        $this->alunoRepository->delete($id);
        return response()->json(true, 204);
    }
}
