<?php


namespace eMiracle\Kudaping;


use Illuminate\Support\ServiceProvider;

class KudapingServiceProvider extends ServiceProvider
{
    public function boot():void
    {
        $config = realpath(__DIR__.'/../resources/config/kudaping.php');

        $this->publishes([
            $config => config_path('kudaping.php')
        ]);
    }

    public function register():void
    {
        $this->app->singleton('kudaping', function ($app) {

            return new Kudaping($app->make("request"));

        });

        $this->app->alias('kudaping', "eMiracle\Kudaping\Kudaping");
    }

    public function provides():array
    {
        return [
            'kudaping'
        ];
    }
}
