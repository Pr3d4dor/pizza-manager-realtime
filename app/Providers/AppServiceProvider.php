<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Boot da aplicação
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Registro de serviços específicos
     * Design Pattern: Dependency Injection
     */
    public function register()
    {
        //
    }
}
