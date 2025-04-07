<?php

namespace Shorunke\Cloudinary;

use Shorunke\Cloudinary\CloudinaryService;
use Illuminate\Support\ServiceProvider;
use Shorunke\Cloudinary\Commands\InstallCommand;

class CloudinaryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/cloudinary.php', 'cloudinary');
        $this->app->singleton(CloudinaryService::class, function ($app) {
            return new CloudinaryService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/cloudinary.php'
            => config_path('cloudinary.php')],'cloudinary-config'
        );
        $this->publishes([
            __DIR__ . '/../CloudinaryService.php'
            => app_path('Services/CloudinaryService.php')],'cloudinary-service'
        );
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
