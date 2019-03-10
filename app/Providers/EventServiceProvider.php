<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Registro dos listeners e quais eventos eles irão ouvir
     * Design Pattern: Observer
     * @var array
     */
    protected $listen = [
        'App\Events\OrderStatusChanged' => [
            'App\Listeners\OrderStatusChangedListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
