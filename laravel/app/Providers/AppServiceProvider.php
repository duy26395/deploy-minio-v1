<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Auth\AdministratorsEloquentUserProvider;
use App\Auth\MemberEloquentUserProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(\App\Http\Middleware\LoggingOperation::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Auth::provider(
            'admin_eloquent_user_provider',
            function ($app, array $config) {
                return new AdministratorsEloquentUserProvider($app['hash'], $config['model']);
            }
        );

        Auth::provider(
            'member_eloquent_user_provider',
            function ($app, array $config) {
                return new MemberEloquentUserProvider($app['hash'], $config['model']);
            }
        );
    }
}
