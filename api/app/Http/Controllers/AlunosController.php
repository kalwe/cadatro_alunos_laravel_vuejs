<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunosController extends Controller
{
    private $aluno;

    public function __construct(Aluno $aluno) {
        $this->aluno = $aluno;
    }

    public function create(Request $req)
    {
        $aluno = $this->aluno->create($req->all());
        return response()->json($aluno);
    }

    public function list()
    {
        $data = $this->aluno->all();
        return response()->json($data);
    }

    public function find($id)
    {
        $data = $this->aluno::findOrFail($id);
        return response()->json($data);
    }

    public function update($id, Request $req)
    {
        $aluno = $this->aluno->findOrFail($id);
        $result = $aluno->update($req->all());

        return response()->json($result);
    }

    public function delete($id)
    {
        $aluno = $this->aluno->findOrFail($id);
        $aluno->delete();

        return response()->json(true);
    }
}
