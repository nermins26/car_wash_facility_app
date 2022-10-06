<?php

namespace App\Providers;

use App\Events\OrderCreated;
use App\Events\UserCreated;
use App\Listeners\CountUserOrders;
use App\Listeners\InitCountUserOrders;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        OrderCreated::class => [
            CountUserOrders::class,
        ],

        UserCreated::class => [
            InitCountUserOrders::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
