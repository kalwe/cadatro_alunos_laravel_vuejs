<?php

namespace App\Providers;

use App\Repositories\IAlunoRepository;
use App\Repositories\AlunoRepository;
use App\Repositories\ICursoRepository;
use App\Repositories\CursoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IAlunoRepository::class, AlunoRepository::class);
        $this->app->bind(ICursoRepository::class, CursoRepository::class);
    }
}
