<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Terminal;
use App\Filial;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $terminals = Terminal::count();
        $filials = Filial::count();
        config([
            'app.terminals-count' => $terminals,
            'app.filials-count' => $filials
        ]);
    }
}
