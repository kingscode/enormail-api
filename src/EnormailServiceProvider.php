<?php

namespace Kingscode\EnormailApi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

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
        $this->publishes([
            $this->packageRootPath('config/enormail.php') => config_path('enormail.php'),
        ]);

        $this->mergeConfigFrom(
            $this->packageRootPath('config/enormail.php'), 'enormail'
        );
    }


    /**
     * Get the package root path.
     *
     * @param $path
     * @return string
     */
    protected function packageRootPath($path)
    {
        return __DIR__ . '/../' . $path;
    }
}
