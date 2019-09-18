<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        \DB::listen(function ($query) {
        $sql = $query->sql;
        for ($i = 0; $i < count($query->bindings); $i++) {
            $sql = preg_replace("/\?/", $query->bindings[$i], $sql, 1);
        }
        \Log::info($sql);
    });
    }
}
