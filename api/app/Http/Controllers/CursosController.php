<?php

namespace App\Http\Controllers;

use App\Repositories\CursoRepository;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    private $cursoRepository;

    public function __construct(CursoRepository $cursoRepository) {
        $this->cursoRepository = $cursoRepository;
    }

    public function create(Request $req)
    {
        $curso = $this->cursoRepository->save($req->all());
        return response()->json($curso);
    }

    public function list()
    {
        return response()->json($this->cursoRepository->listAll());
    }

    public function find($id)
    {
        $data = $this->cursoRepository->findById($id);
        return response()->json($data);
    }

    public function update($id, Request $req)
    {
        $result = $this->cursoRepository->update($id, $req->all());
        return response()->json($result);
    }

    public function delete($id)
    {
        $this->cursoRepository->delete($id);
        return response()->json(true);
    }
}
