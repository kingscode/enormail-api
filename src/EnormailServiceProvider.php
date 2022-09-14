<?php

namespace Kingscode\EnormailApi;

use Illuminate\Support\ServiceProvider;

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
