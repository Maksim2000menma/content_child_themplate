<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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

    public function boot()
    {
        View::composer('*', function ($view) {
            $request = request();

            // только для /admin и /admin/*
            if (!$request->is('admin', 'admin/*')) {
                return;
            }

            $view->with('user', Auth::user());
            $view->with('csrf', $request->hasSession() ? $request->session()->token() : '');
        });
    }
}
