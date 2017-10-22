<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\TransferToBank' => [
            'App\Listeners\UpdateWalletBalance',
        ],

        'App\Events\FundWallet' => [
            'App\Listeners\FundWalletBalance',
        ],

        'App\Events\WalletToWallet' => [
            'App\Listeners\WalletTransferBalance',
        ],

        'App\Events\PhoneTopUpTransaction' => [
            'App\Listeners\WalletBalance',
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

        //
    }
}
