<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome',
        'valor_mensalidade',
        'valor_matricula',
        'periodo',
        'meses_duracao'
    ];
}
