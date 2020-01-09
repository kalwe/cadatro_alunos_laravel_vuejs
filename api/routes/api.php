<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors'], 'prefix' => 'alunos'], function()
{
    Route::get('/', 'AlunosController@list')->name('alunos');
    Route::get('/{id}', 'AlunosController@find')->name('alunos.find');
    Route::post('/', 'AlunosController@create')->name('alunos.create');
    Route::put('/{aluno}', 'AlunosController@update')->name('alunos.update');
    Route::delete('/{aluno}', 'AlunosController@delete')->name('alunos.delete');
});

Route::group(['middleware' => ['cors'], 'prefix' => 'cursos'], function()
{
    Route::get('/', 'CursosController@list')->name('cursos');
    Route::get('/{id}', 'CursosController@find')->name('cursos.find');
    Route::post('/', 'CursosController@create')->name('cursos.create');
    Route::put('/{cursos}', 'CursosController@update')->name('cursos.update');
    Route::delete('/{aluno}', 'CursosController@delete')->name('cursos.delete');
});
