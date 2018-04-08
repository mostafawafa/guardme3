<?php

namespace Responsive\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

use Responsive\Contracts\SMSProviderContract;
use Responsive\Wrappers\TwilioServiceWrapper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(SMSProviderContract::class, function () {
            return new TwilioServiceWrapper(config('services.twilio'));
        });
    }
}
