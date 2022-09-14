<?php

namespace Kingscode\EnormailApi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class EnormailServiceProvider extends ServiceProvider
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
        Http::macro('enormail', function () {
            return Http::withHeaders([
                'X-Example' => 'example',
            ])->baseUrl('https://github.com');
        });
    }
}
