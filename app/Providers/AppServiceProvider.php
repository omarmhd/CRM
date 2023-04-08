<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
//        Gate::define('employee', function(User $user) {
//            return $user->role == "employee";
//        });
//        Gate::define('administrator', function(User $user) {
//            return $user->role == "administrator";
//        });
//        Gate::define('hr', function(User $user) {
//            return $user->role == "hr";
//        });
//        Gate::define('evaluator', function(User $user) {
//            return $user->role == "evaluator";
//        });
//        Gate::define('query', function(User $user) {
//            return $user->role == "query";
//        });

    }
}
