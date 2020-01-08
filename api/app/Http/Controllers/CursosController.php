<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursosController extends Controller
{
    private $curso;

    public function __construct(Curso $curso) {
        $this->curso = $curso;
    }

    public function create(Request $req)
    {
        $curso = $this->curso->create($req->all());
        return response()->json($curso);
    }

    public function list()
    {
        $data = $this->curso->all();
        return response()->json($data);
    }

    public function find($id)
    {
        $data = $this->curso::findOrFail($id);
        return response()->json($data);
    }

    public function update($id, Request $req)
    {
        $curso = $this->curso->findOrFail($id);
        $result = $curso->update($req->all());

        return response()->json($result);
    }

    public function delete($id)
    {
        $curso = $this->curso->findOrFail($id);
        $curso->delete();

        return response()->json(true);
    }
}
