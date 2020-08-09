<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::morphMap([
            'client' => 'Domain\Client\Client',
            'agent' => 'Domain\Agent\Agent',
            'order' => 'Domain\Order\Order',
            'user' => 'Domain\User\User',
        ]);
    }
}
