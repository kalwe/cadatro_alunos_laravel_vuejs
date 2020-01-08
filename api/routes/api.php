<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors']], function()
{
    Route::options('{any}');
    Route::get('alunos/', 'AlunosController@list');
    Route::get('alunos/{id}', 'AlunosController@find');
    Route::post('alunos/', 'AlunosController@create');
    Route::put('alunos/{aluno}', 'AlunosController@update');
    Route::delete('alunos/{aluno}', 'AlunosController@delete');
});

Route::group(['middleware' => ['cors']], function()
{
    Route::options('{any}');
    Route::get('cursos/', 'CursosController@list');
    Route::get('cursos/{id}', 'CursosController@find');
    Route::post('cursos/', 'CursosController@create');
    Route::put('cursos/{cursos}', 'CursosController@update');
    Route::delete('cursos/{aluno}', 'CursosController@delete');
});
