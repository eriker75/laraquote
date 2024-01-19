<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\QuoteServiceInterface;
use App\Services\QuoteService;

class BinderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QuoteServiceInterface::class, QuoteService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
