<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        $this->setHomeRoute();
    }

    /**
     * Dynamically set the HOME constant based on user's roles.
     */
    private function setHomeRoute(): void
    {
        if (Auth::check()) {
            $user = Auth::user();
            $roles = $user->roles->pluck('name')->toArray();

            if (in_array('Admin', $roles) || in_array('Super admin', $roles)) {
                define('App\Providers\RouteServiceProvider::HOME', '/adminDashboard');
            } elseif (array_intersect(['Manager', 'Coordinator', 'Finance', 'Consultant'], $roles)) {
                define('App\Providers\RouteServiceProvider::HOME', '/officeDashboard');
            } elseif (in_array('Student', $roles)) {
                define('App\Providers\RouteServiceProvider::HOME', '/studentDashboard');
            }
        }
    }
}
