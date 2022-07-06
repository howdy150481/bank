<?php

namespace App\Providers;

use App\Models\Players;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

//        if (!empty($_SERVER['HTTPS'])) {
            URL::forceScheme('https');
//        }

        app('view')->composer('layouts.web', function ($view) {
            $view->with(['players' => Players::all()]);
        });
    }
}
