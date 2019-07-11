<?php

namespace shaab\sms;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('shaab',function(){
            return new sms;
        });

        $this->mergeConfigFrom(
        __DIR__.'/config/sms.php', 'sms'
    );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__.'/config/sms.php' => config_path('sms.php'),
        ]);
    }
}
