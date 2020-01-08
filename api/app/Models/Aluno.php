<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'cpf',
        'rg',
        'data_nascimento',
        'nome',
        'telefone'
    ];
}
