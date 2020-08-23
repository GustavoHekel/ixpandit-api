<?php

namespace App\Providers;

use App\SDKs\PokemonSDK;
use App\SDKs\PokemonSDKContract;
use Illuminate\Support\ServiceProvider;

class APIServiceProvider extends ServiceProvider
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
        $this->app->singleton(PokemonSDKContract::class, function () {
            return new PokemonSDK();
        });
    }
}
