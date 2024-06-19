<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\Facades\Schema;
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        \Carbon\Carbon::setLocale('uz_UZ');
        date_default_timezone_set('Asia/Tashkent');

        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
    }
}
