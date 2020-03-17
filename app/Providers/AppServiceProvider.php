<?php

namespace App\Providers;

use App\Models\Company;
use Illuminate\Support\Facades\Route;
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
//        Route::bind('company', function ($value) {
//            $result = null;
//
//            return $result;
//        });
    }
}
