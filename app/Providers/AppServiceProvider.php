<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('strong_password', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{12,}$/', $value);
        });

        Validator::replacer('strong_password', function () {
            return 'Het wachtwoord moet minimaal 12 tekens lang zijn en een hoofdletter, kleine letter, cijfer en speciaal teken bevatten.';
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(3)->by($request->email.$request->ip());
});
    }
}
