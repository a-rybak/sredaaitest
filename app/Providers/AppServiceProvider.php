<?php

namespace App\Providers;

use App\Services\CertficateService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(CertficateService::class, function (){
            $link = env('APP_QR_LINK') ?? env('APP_URL');
            return new CertficateService($link);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
