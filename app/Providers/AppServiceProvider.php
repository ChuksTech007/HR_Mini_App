<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    
    protected array $middleware = [
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ... existing route group logic ...
        
        // Register the alias for use in routes/web.php
        // In some Laravel versions, this is handled automatically if $middleware is defined.
        // However, explicitly mapping it ensures it works:
        $router = $this->app->make(\Illuminate\Routing\Router::class);
        $router->aliasMiddleware('admin', \App\Http\Middleware\AdminMiddleware::class);
        
        // ... other code ...
    }
}
